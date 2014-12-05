<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ApiTestPayload;
use CL\Slack\Payload\PayloadInterface;

class ApiTestPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ApiTestPayload();
        $payload->setError('fake-error');
        $payload->addArgument('foo', 'bar');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ApiTestPayload $payload
     * @param array          $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
        $this->assertEquals($payload->getError(), $payloadData['error']);
        $this->assertEquals($payload->getArgument('foo'), $payloadData['foo']);
    }
}
