<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Util;

use CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadFactory
{
    /**
     * @param array $args
     *
     * @return Payload\ApiTestPayload
     */
    public static function apiTest(array $args = [])
    {
        $payload = new Payload\ApiTestPayload();
        $payload->replaceArguments($args);

        return $payload;
    }

    /**
     * @return Payload\AuthTestPayload
     */
    public static function authTest()
    {
        $payload = new Payload\AuthTestPayload();

        return $payload;
    }

    /**
     * @param string $name
     *
     * @return Payload\ChannelsCreatePayload
     */
    public static function channelsCreate($name)
    {
        $payload = new Payload\ChannelsCreatePayload();
        $payload->setName($name);

        return $payload;
    }

    /**
     * @param string     $channelId
     * @param int|null   $count
     * @param float|null $latest
     * @param float|null $oldest
     *
     * @return Payload\ChannelsHistoryPayload
     */
    public static function channelsHistory($channelId, $count = null, $latest = null, $oldest = null)
    {
        $payload = new Payload\ChannelsHistoryPayload();
        $payload->setChannelId($channelId);
        $payload->setCount($count);
        $payload->setLatest($latest);
        $payload->setOldest($oldest);

        return $payload;
    }

    /**
     * @param string $channelId

     * @return Payload\ChannelsInfoPayload
     */
    public static function channelsInfo($channelId)
    {
        $payload = new Payload\ChannelsInfoPayload();
        $payload->setChannelId($channelId);

        return $payload;
    }

    /**
     * @param string $channelId
     * @param string $userId

     * @return Payload\ChannelsInvitePayload
     */
    public static function channelsInvite($channelId, $userId)
    {
        $payload = new Payload\ChannelsInvitePayload();
        $payload->setChannelId($channelId);
        $payload->setUserId($userId);

        return $payload;
    }

    /**
     * @param string $channel

     * @return Payload\ChannelsJoinPayload
     */
    public static function channelsJoin($channel)
    {
        $payload = new Payload\ChannelsJoinPayload();
        $payload->setChannel($channel);

        return $payload;
    }

    /**
     * @param string $channelId
     * @param string $userId

     * @return Payload\ChannelsKickPayload
     */
    public static function channelsKick($channelId, $userId)
    {
        $payload = new Payload\ChannelsKickPayload();
        $payload->setChannelId($channelId);
        $payload->setUserId($userId);

        return $payload;
    }

    /**
     * @param string $channelId

     * @return Payload\ChannelsLeavePayload
     */
    public static function channelsLeave($channelId)
    {
        $payload = new Payload\ChannelsLeavePayload();
        $payload->setChannelId($channelId);

        return $payload;
    }

    /**
     * @return Payload\ChannelsListPayload
     */
    public static function channelsList()
    {
        $payload = new Payload\ChannelsListPayload();

        return $payload;
    }

    /**
     * @param string      $channel
     * @param string      $text
     * @param string|null $username
     * @param string|null $iconEmoji
     * @param string|null $iconUrl
     *
     * @return Payload\ChatPostMessagePayload
     */
    public static function chatPostMessage($channel, $text, $username = null, $iconEmoji = null, $iconUrl = null)
    {
        $payload = new Payload\ChatPostMessagePayload();
        $payload->setChannel($channel);
        $payload->setText($text);

        if ($username !== null) {
            $payload->setUsername($username);
        }

        if ($iconEmoji !== null) {
            $payload->setIconEmoji($iconEmoji);
        } elseif ($iconUrl !== null) {
            $payload->setIconUrl($iconUrl);
        }

        return $payload;
    }
}
