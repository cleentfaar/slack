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
        $payload->setChannelId('C1234567');
        $payload->setCount(10);
        $payload->setOldest(1111.1111);
        $payload->setLatest(9999.9999);

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsHistoryPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'channel' => $payload->getChannelId(),
            'latest'  => $payload->getLatest(),
            'oldest'  => $payload->getOldest(),
            'count'   => $payload->getCount(),
        ];
    }
}
