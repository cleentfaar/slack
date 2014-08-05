<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Model;

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SimpleMessage extends AbstractModel
{
    /**
     * @return float|null The Slack timestamp on which the message was posted
     */
    public function getTimestamp()
    {
        return $this->data['ts'];
    }

    /**
     * @return string The type of message
     */
    public function getType()
    {
        return $this->data['mimetype'];
    }

    /**
     * @return string The ID of the user that posted the message
     */
    public function getUserId()
    {
        return $this->data['user'];
    }

    /**
     * @return string The username belonging to the user that posted the message
     */
    public function getUsername()
    {
        return $this->data['username'];
    }

    /**
     * @return string The actual text of the message
     */
    public function getText()
    {
        return $this->data['text'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'ts',
            'type',
            'subtype',
            'username',
            'text',
        ]);
        $resolver->setOptional([
            'user',
        ]);
        $resolver->setAllowedTypes([
            'ts'       => ['float', 'null'],
            'type'     => ['string'],
            'subtype'  => ['string'],
            'user'     => ['string'],
            'username' => ['string'],
            'text'     => ['string'],
        ]);
        $resolver->setAllowedValues([
            'type' => ['message', 'im', 'general'],
        ]);
        $resolver->setNormalizers([
            'ts' => function (Options $options, $ts) {
                if (!$ts) {
                    return null;
                }

                return (float) $ts;
            },
        ]);
    }
}
