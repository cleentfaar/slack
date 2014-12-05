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
        $responseData          = $this->getResponseData();
        $actualPayloadResponse = $this->serializer->deserialize(
            json_encode($responseData),
            $this->getResponseClass(),
            'json'
        );

        $this->assertInstanceOf($this->getResponseClass(), $actualPayloadResponse);

        return $this->assertResponse($responseData, $actualPayloadResponse);
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
