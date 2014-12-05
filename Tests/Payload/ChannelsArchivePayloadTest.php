<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ChannelsArchivePayload;
use CL\Slack\Payload\PayloadInterface;

class ChannelsArchivePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsArchivePayload();
        $payload->setChannelId('C1234567');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsArchivePayload $payload
     * @param array                  $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
        $this->assertEquals($payload->getChannelId(), $payloadData['channel']);
    }
}
