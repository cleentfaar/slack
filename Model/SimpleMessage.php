<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

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
        return $this->data['type'];
    }

    /**
     * @return string|null The subtype of message
     */
    public function getSubType()
    {
        return $this->data['subtype'];
    }

    /**
     * @return string|null The ID of the user that posted the message,
     *                     can be null if the message was made by Slack itself.
     */
    public function getUserId()
    {
        return $this->data['user'];
    }

    /**
     * @return string|null The username belonging to the user that posted the message,
     *                     can be null if the message was made by Slack itself.
     */
    public function getUsername()
    {
        return $this->data['username'];
    }

    /**
     * @return string The actual text of the message.
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
            'text',
        ]);

        $resolver->setOptional([
            'subtype',
            'user',
            'username',
            'icons',
            'bot_id',
            'upload',
            'comment',
            'members',
        ]);

        $resolver->setAllowedTypes([
            'ts'       => ['float', 'null'],
            'type'     => ['string'],
            'subtype'  => ['string'],
            'user'     => ['string'],
            'username' => ['string'],
            'text'     => ['string'],
            'icons'    => ['array'],
            'bot_id'   => ['string'],
            'upload'   => ['boolean'],
            'comment'  => ['string'],
            'members'  => ['array'],
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
