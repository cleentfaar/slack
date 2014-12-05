<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\AuthTestPayload;
use CL\Slack\Payload\PayloadInterface;

class AuthTestPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new AuthTestPayload();

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param AuthTestPayload $payload
     * @param array           $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
    }
}
