<?php

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\PayloadInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

abstract class AbstractPayloadTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testPayload()
    {
        $payload     = $this->createPayload();
        $payloadData = $this->serializer->serialize(
            $payload,
            'json'
        );

        $this->assertInternalType('string', $payload->getMethod());
        $this->assertTrue(class_exists($payload->getResponseClass()));
        $this->assertPayload($payload, json_decode($payloadData, true));
    }

    /**
     * @return PayloadInterface
     */
    abstract protected function createPayload();

    /**
     * @param PayloadInterface $payload
     * @param array            $payloadData
     */
    abstract protected function assertPayload(PayloadInterface $payload, array $payloadData);
}
