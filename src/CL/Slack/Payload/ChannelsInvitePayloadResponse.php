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

use CL\Slack\Model\Channel;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInvitePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Channel|null
     */
    private $channel;

    /**
     * @return Channel|null
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
