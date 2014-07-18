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
     * @return int The Slack timestamp on which your message has been posted.
     */
    public function getTimestamp()
    {
        return $this->data['timestamp'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);
        $resolver->setRequired([
            'timestamp',
        ]);
        $resolver->setNormalizers([
            'timestamp' => function (Options $options, $timestamp) {
                return intval($timestamp);
            }
        ]);
        $resolver->setAllowedTypes([
            'timestamp' => ['int'],
        ]);
    }
}
