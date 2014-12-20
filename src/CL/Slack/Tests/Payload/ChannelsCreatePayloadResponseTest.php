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

use CL\Slack\Payload\ChannelsCreatePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsCreatePayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * @inheritdoc
     */
    protected function createResponseData()
    {
        return [
            'channel' => [
                'id'      => 'C1234567',
                'name'    => 'acme_channel',
                'created' => '12345678',
                'creator' => 'U1234567',
            ],
        ];
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
