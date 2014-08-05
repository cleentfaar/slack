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

use CL\Slack\Api\Method\Model\Message;
use CL\Slack\Api\Method\Model\SimpleMessage;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsHistoryResponse extends Response
{
    /**
     * @return int The (Slack) timestamp on which the latest action was performed on the channel.
     */
    public function getLatest()
    {
        return $this->data['latest'];
    }

    /**
     * @return Message[] The (Slack) messages posted on the channel.
     */
    public function getMessages()
    {
        return $this->data['messages'];
    }

    /**
     * @return bool Whether there are more messages that can be queried for using the 'latest' timestamp returned.
     */
    public function getHasMore()
    {
        return $this->data['has_more'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setOptional([
            'latest',
            'oldest',
            'messages',
            'has_more',
        ]);
        $resolver->setDefaults([
            'messages' => [],
            'has_more' => false,
        ]);
        $resolver->setAllowedTypes([
            'latest'   => ['float', 'null'],
            'oldest'   => ['float', 'null'],
            'messages' => ['array'],
            'has_more' => ['bool'],
        ]);
        $resolver->setNormalizers([
            'messages' => function (Options $options, $messages) {
                return array_map(function ($messageData) {
                    return new SimpleMessage($messageData);
                }, $messages);
            },
        ]);
    }
}
