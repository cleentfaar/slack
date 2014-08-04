<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatPostMessageResponse extends Response
{
    /**
     * @return float|null The Slack timestamp on which your message has been posted, or null if the call failed
     */
    public function getTimestamp()
    {
        return $this->data['ts'];
    }

    /**
     * @return string|null The Slack channel on which your message has been posted, or null if the call failed
     */
    public function getChannel()
    {
        return $this->data['channel'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setOptional([
            'ts',
            'channel',
        ]);
        $resolver->setNormalizers([
            'ts' => function (Options $options, $ts) {
                if (!$ts) {
                    return null;
                }

                return (float) $ts;
            },
        ]);
        $resolver->setAllowedTypes([
            'ts'      => ['float', 'null'],
            'channel' => ['string'],
        ]);
    }
}
