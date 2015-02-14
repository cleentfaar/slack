<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/docs/formatting
 */
class MessageResultItem extends Message
{
    /**
     * @var SimpleChannel|null
     */
    private $channel;

    /**
     * @return SimpleChannel|null The channel object on which the message was posted
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
