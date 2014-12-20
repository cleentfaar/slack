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
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/channels.invite
 */
class ChannelsInvitePayload extends AbstractPostPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $channel;
    
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $user;

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
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->user = $userId;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'channels.invite';
    }
}
