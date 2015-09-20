<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatDeletePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string|null
     */
    private $channel;

    /**
     * @var string
     */
    private $ts;

    /**
     * @return string|null
     */
    public function getChannelId()
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getSlackTimestamp()
    {
        return $this->ts;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPossibleErrors()
    {
        return array_merge(parent::getPossibleErrors(), [
            'message_not_found' => 'No message exists with the requested timestamp',
            'cant_delete_message' => 'Authenticated user does not have permission to delete this message',
        ]);
    }
}
