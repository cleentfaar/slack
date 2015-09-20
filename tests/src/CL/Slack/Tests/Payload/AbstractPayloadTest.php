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
use CL\Slack\Serializer\PayloadSerializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PayloadSerializer
     */
    private $payloadSerializer;

    protected function setUp()
    {
        $this->payloadSerializer = new PayloadSerializer();
    }

    /**
     * @test
     */
    public function it_can_be_serialized()
    {
        $payload = $this->createPayload();

        $this->assertInternalType('string', $payload->getMethod());
        $this->assertTrue(class_exists($payload->getResponseClass()));

        $expectedPayloadSerialized = json_encode($this->getExpectedPayloadData($payload));
        $actualPayloadSerialized = json_encode($this->payloadSerializer->serialize($payload));

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
