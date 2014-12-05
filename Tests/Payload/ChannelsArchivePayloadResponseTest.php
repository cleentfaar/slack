<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ChannelsArchivePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

class ChannelsArchivePayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * @inheritdoc
     */
    protected function getResponseData()
    {
        return [
            'channel' => 'acme_channel',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getResponseClass()
    {
        return 'CL\Slack\Payload\ChannelsArchivePayloadResponse';
    }

    /**
     * {@inheritdoc}
     *
     * @param array                   $responseData
     * @param ChannelsArchivePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
    }
}
