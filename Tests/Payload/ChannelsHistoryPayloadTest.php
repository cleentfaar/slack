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

use CL\Slack\Payload\ChannelsHistoryPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsHistoryPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsHistoryPayload();
        $payload->setChannelId('C01234567');
        $payload->setCount(10);
        $payload->setOldest(11111111);
        $payload->setLatest(99999999);

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsHistoryPayload $payload
     * @param array                  $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
        $this->assertEquals($payload->getChannelId(), $payloadData['channel']);
        $this->assertEquals($payload->getCount(), $payloadData['count']);
        $this->assertEquals($payload->getOldest(), $payloadData['oldest']);
        $this->assertEquals($payload->getLatest(), $payloadData['latest']);
    }
}
