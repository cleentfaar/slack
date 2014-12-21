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

use CL\Slack\Payload\ChannelsUnarchivePayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsUnarchivePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsUnarchivePayload();
        $payload->setChannelId('C1234567');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsUnarchivePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'channel' => $payload->getChannelId(),
        ];
    }
}
