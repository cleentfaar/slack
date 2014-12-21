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

use CL\Slack\Payload\PayloadInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
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
        $payload = $this->createPayload();

        $this->assertInternalType('string', $payload->getMethod());
        $this->assertTrue(class_exists($payload->getResponseClass()));

        $expectedPayloadSerialized = $this->serializer->serialize($this->getExpectedPayloadData($payload), 'json');
        $actualPayloadSerialized   = $this->serializer->serialize($payload, 'json');

        $this->assertEquals(
            json_decode($expectedPayloadSerialized, true),
            json_decode($actualPayloadSerialized, true)
        );
    }

    /**
     * @return PayloadInterface
     */
    abstract protected function createPayload();

    /**
     * @param PayloadInterface $payload
     *
     * @return array
     */
    abstract protected function getExpectedPayloadData(PayloadInterface $payload);
}
