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
