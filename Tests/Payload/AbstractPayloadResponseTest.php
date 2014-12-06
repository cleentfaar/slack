<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\PayloadResponseInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

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
     * @return string
     */
    abstract protected function getResponseClass();

    /**
     * @return array
     */
    abstract protected function getResponseData();
}
