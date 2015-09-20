<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ChannelsInvitePayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInvitePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsInvitePayload();
        $payload->setChannelId('C1234567');
        $payload->setUserId('U1234567');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsInvitePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'channel' => $payload->getChannelId(),
            'user' => $payload->getUserId(),
        ];
    }
}
