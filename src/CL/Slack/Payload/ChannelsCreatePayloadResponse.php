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

use CL\Slack\Model\SimpleChannel;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsCreatePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var SimpleChannel
     */
    private $channel;

    /**
     * @return SimpleChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
