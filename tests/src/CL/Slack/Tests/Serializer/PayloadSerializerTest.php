<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Serializer;

use CL\Slack\Serializer\PayloadSerializer;
use CL\Slack\Test\Payload\PayloadMock;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadSerializerTest extends \PHPUnit_Framework_TestCase
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
        $payload = new PayloadMock();
        $payload->setFruit('apple');

        $serializedPayload = $this->payloadSerializer->serialize($payload);

        $this->assertInternalType('array', $serializedPayload);
        $this->assertArrayHasKey('fruit', $serializedPayload);
        $this->assertEquals($payload->getFruit(), $serializedPayload['fruit']);
    }
}
