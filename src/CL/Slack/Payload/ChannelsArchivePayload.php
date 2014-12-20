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

use JMS\Serializer\Annotation as Serializer;

/**
 * Payload that triggers the channels.archive-method; archiving a channel.
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/channels.archive
 */
class ChannelsArchivePayload extends AbstractPostPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $channel;

    /**
     * @param string $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channel = $channelId;
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'channels.archive';
    }
}
