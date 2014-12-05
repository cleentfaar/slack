<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ChannelsCreatePayload;
use CL\Slack\Payload\PayloadInterface;

class ChannelsCreatePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsCreatePayload();
        $payload->setName('acme_channel');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsCreatePayload $payload
     * @param array                  $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
        $this->assertEquals($payload->getName(), $payloadData['name']);
    }
}
