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

use CL\Slack\Payload\ChannelsInfoPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInfoPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * @inheritdoc
     */
    protected function getResponseData()
    {
        return [
            'channel' => [
                'id'        => 'C1234567',
                'created'   => '12345678',
                'creator'   => 'U1234567',
                'last_read' => '12345678',
                'latest'    => [
                    'text'    => 'Hello World!',
                    'user'    => 'U123457',
                    'channel' => [
                        'id' => 'C1234567',
                    ],
                ],
                'members'   => [
                    'U1234567'
                ],
                'name'      => 'acme_channel',
                'purpose'   => [
                    'value' => 'Acme channel\'s purpose here',
                ],
                'topic'     => [
                    'value' => 'Acme channel\'s topic here',
                ],
                'username'  => 'acme_user',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                       $responseData
     * @param ChannelsInfoPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $channel = $payloadResponse->getChannel();

        $this->assertInstanceOf('CL\Slack\Model\Channel', $channel);
        $this->assertArrayHasKey('channel', $responseData);

        $channelData = $responseData['channel'];

        $this->assertEquals($channel->getId(), $channelData['id']);
        $this->assertEquals($channel->getCreated()->format('U'), $channelData['created']);
        $this->assertEquals($channel->getCreator(), $channelData['creator']);
        $this->assertEquals($channel->getLastRead(), $channelData['last_read']);
        $this->assertEquals($channel->getLatestMessage()->getText(), $channelData['latest']['text']);
        $this->assertEquals($channel->getLatestMessage()->getUserId(), $channelData['latest']['user']);
        $this->assertEquals($channel->getMembers(), $channelData['members']);
        $this->assertEquals($channel->getName(), $channelData['name']);
        $this->assertEquals($channel->getPurpose()->getValue(), $channelData['purpose']['value']);
        $this->assertEquals($channel->getTopic()->getValue(), $channelData['topic']['value']);
    }
}
