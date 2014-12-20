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
    abstract protected function getResponseData();
}
