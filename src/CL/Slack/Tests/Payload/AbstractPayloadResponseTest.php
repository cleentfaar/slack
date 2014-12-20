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

use CL\Slack\Model\Channel;
use CL\Slack\Payload\PayloadResponseInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testPayloadResponse()
    {
        $responseData = array_merge(['ok' => true], $this->getResponseData());

        /** @var PayloadResponseInterface $actualPayloadResponse */
        $actualPayloadResponse = $this->serializer->deserialize(
            json_encode($responseData),
            $this->getResponseClass(),
            'json'
        );

        $this->assertInstanceOf('CL\Slack\Payload\PayloadResponseInterface', $actualPayloadResponse);
        $this->assertInstanceOf($this->getResponseClass(), $actualPayloadResponse);
        $this->assertEquals($responseData['ok'], $actualPayloadResponse->isOk());
        if (array_key_exists('error', $responseData)) {
            $this->assertEquals($responseData['error'], $actualPayloadResponse->getError());
            $this->assertInternalType('string', $actualPayloadResponse->getErrorExplanation());
        }
        $this->assertResponse($responseData, $actualPayloadResponse);
    }

    /**
     * @param array                    $responseData
     * @param PayloadResponseInterface $payloadResponse
     */
    abstract protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse);

    /**
     * @param array                    $responseData
     * @param PayloadResponseInterface $payloadResponse
     */
    protected function assertResponseWithChannel(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        /** @var Channel $channel */
        $channel = $payloadResponse->getChannel();

        $this->assertInstanceOf('CL\Slack\Model\Channel', $channel);
        $this->assertArrayHasKey('channel', $responseData);

        $channelResponseData = $responseData['channel'];

        $this->assertEquals($channel->getId(), $channelResponseData['id']);
        $this->assertEquals($channel->getCreated()->format('U'), $channelResponseData['created']);
        $this->assertEquals($channel->getCreator(), $channelResponseData['creator']);
        $this->assertEquals($channel->getLastRead(), $channelResponseData['last_read']);
        $this->assertEquals($channel->getLatestMessage()->getText(), $channelResponseData['latest']['text']);
        $this->assertEquals($channel->getLatestMessage()->getUserId(), $channelResponseData['latest']['user']);
        $this->assertEquals($channel->getMembers(), $channelResponseData['members']);
        $this->assertEquals($channel->getName(), $channelResponseData['name']);
        $this->assertEquals($channel->getPurpose()->getValue(), $channelResponseData['purpose']['value']);
        $this->assertEquals($channel->getTopic()->getValue(), $channelResponseData['topic']['value']);
    }


    /**
     * @inheritdoc
     */
    protected function getResponseClass()
    {
        $class = get_class($this);
        $name  = substr($class, strripos($class, '\\') + 1, -4);

        return sprintf('CL\Slack\Payload\%s', $name);
    }

    /**
     * @return array
     */
    protected function getChannelResponseData()
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
     * @return array
     */
    abstract protected function getResponseData();
}
