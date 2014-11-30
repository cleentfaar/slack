<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/channels.leave
 */
class ChannelsLeavePayload extends AbstractPostPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $channel;

    /**
     * @param string $channelId ID of the channel to remove user from
     */
    public function setChannelId($channelId)
    {
        $this->channel = $channelId;
    }

    /**
     * @return string ID of the channel to remove user from
     */
    public function getChannelId()
    {
        return $this->channel;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'channels.leave';
    }
}
