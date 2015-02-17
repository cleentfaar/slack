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
class ChatPostMessagePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string|null
     */
    private $ts;

    /**
     * @var string|null
     */
    private $channel;

    /**
     * @return string|null The Slack timestamp on which your message has been posted, or null if the call failed
     */
    public function getSlackTimestamp()
    {
        return $this->ts;
    }

    /**
     * @return string|null The Slack channel ID on which your message has been posted, or null if the call failed
     */
    public function getChannelId()
    {
        return $this->channel;
    }
}
