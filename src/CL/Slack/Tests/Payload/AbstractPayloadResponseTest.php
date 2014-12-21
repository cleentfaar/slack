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
        $responseData = array_merge(['ok' => true], $this->createResponseData());

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
     * Compares the expected response data against the values returned by the actual Response's methods
     *
     * @param array                    $responseData
     * @param PayloadResponseInterface $payloadResponse
     */
    abstract protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse);

    /**
     * @param array   $expectedChannelResponseData
     * @param Channel $actualChannel
     */
    protected function assertChannel(array $expectedChannelResponseData, $actualChannel)
    {
        $this->assertNotEmpty($expectedChannelResponseData);
        $this->assertInstanceOf('CL\Slack\Model\Channel', $actualChannel);
        $this->assertInstanceOf('\DateTime', $actualChannel->getCreated());
        $this->assertEquals($expectedChannelResponseData, [
            'id'        => $actualChannel->getId(),
            'created'   => $actualChannel->getCreated()->format('U'),
            'creator'   => $actualChannel->getCreator(),
            'last_read' => $actualChannel->getLastRead(),
            'latest'    => [
                'channel'  => [
                    'id'   => $actualChannel->getLatestMessage()->getChannel()->getId(),
                    'name' => $actualChannel->getLatestMessage()->getChannel()->getName(),
                ],
                'ts'       => $actualChannel->getLatestMessage()->getTimestamp(),
                'type'     => $actualChannel->getLatestMessage()->getType(),
                'text'     => $actualChannel->getLatestMessage()->getText(),
                'user'     => $actualChannel->getLatestMessage()->getUserId(),
                'username' => $actualChannel->getLatestMessage()->getUsername(),
            ],
            'members'   => $actualChannel->getMembers(),
            'name'      => $actualChannel->getName(),
            'purpose'   => [
                'value' => $actualChannel->getPurpose()->getValue(),
            ],
            'topic'     => [
                'value' => $actualChannel->getTopic()->getValue(),
            ],
        ]);
    }


    /**
     * Returns the response class used for this test-case
     * Can be overwritten if it deviates from the standard pattern
     */
    protected function getResponseClass()
    {
        $class = get_class($this);
        $name  = substr($class, strripos($class, '\\') + 1, -4);

        return sprintf('CL\Slack\Payload\%s', $name);
    }

    /**
     * Returns an example of channel-data that could be returned by a response
     * Used by different tests to simplify their fixtures
     *
     * @return array
     */
    protected function createChannelResponseData()
    {
        return [
            'id'        => 'C1234567',
            'created'   => '12345678',
            'creator'   => 'U1234567',
            'last_read' => floatval('12345678'),
            'latest'    => [
                'ts'       => floatval('12345678'),
                'text'     => 'Hello World!',
                'user'     => 'U123457',
                'username' => 'acme_user',
                'channel'  => [
                    'id'   => 'C1234567',
                    'name' => 'acme_channel',
                ],
                'type'     => 'message',
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
        ];
    }

    /**
     * Returns the data used for comparison against the actual Response class
     *
     * @return array
     */
    abstract protected function createResponseData();
}
