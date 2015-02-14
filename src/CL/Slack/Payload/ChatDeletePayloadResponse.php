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
     * @var float
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
     * @return float
     */
    public function getTimestamp()
    {
        return $this->ts;
    }

    /**
     * {@inheritdoc}
     */
    protected function getOwnErrors()
    {
        return [
            'message_not_found'   => 'No message exists with the requested timestamp',
            'cant_delete_message' => 'Authenticated user does not have permission to delete this message',
        ];
    }
}
