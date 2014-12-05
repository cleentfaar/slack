<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ChannelsCreatePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

class ChannelsCreatePayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * @inheritdoc
     */
    protected function getResponseData()
    {
        return [
            'channel' => [
                'id'             => 'C012345678',
                'name'           => 'acme_channel',
                'created'        => '12345678',
                'creator'        => 'U1234567',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getResponseClass()
    {
        return 'CL\Slack\Payload\ChannelsCreatePayloadResponse';
    }

    /**
     * {@inheritdoc}
     *
     * @param array                         $responseData
     * @param ChannelsCreatePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $channel = $payloadResponse->getChannel();
        
        $this->assertEquals($channel->getId(), $responseData['channel']['id']);
        $this->assertEquals($channel->getName(), $responseData['channel']['name']);
        $this->assertEquals($channel->getCreated()->format('U'), $responseData['channel']['created']);
        $this->assertEquals($channel->getCreator(), $responseData['channel']['creator']);
    }
}
