<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ApiTestPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

class ApiTestPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * @inheritdoc
     */
    protected function getResponseData()
    {
        return [
            'error' => 'fake-error',
            'args' => [
                'foo' => 'bar',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getResponseClass()
    {
        return 'CL\Slack\Payload\ApiTestPayloadResponse';
    }

    /**
     * {@inheritdoc}
     *
     * @param array                  $responseData
     * @param ApiTestPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($payloadResponse->getArguments(), $responseData['args']);
        $this->assertEquals($payloadResponse->getArgument('foo'), $responseData['args']['foo']);
        $this->assertEquals($payloadResponse->getError(), $responseData['error']);
    }
}
