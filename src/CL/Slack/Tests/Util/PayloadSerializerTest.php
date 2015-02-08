<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Util;

use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Util\PayloadSerializer;
use JMS\Serializer\SerializerBuilder;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadSerializerTest extends AbstractTestCase
{
    /**
     * @var PayloadSerializer
     */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = new PayloadSerializer(SerializerBuilder::create()->build());
    }

    public function testSerializePayload()
    {
        $payload           = $this->getMock('CL\Slack\Payload\PayloadInterface');
        $serializedPayload = $this->serializer->serializePayload($payload);

        $this->assertInternalType('array', $serializedPayload);
    }

    public function testDeserializePayloadResponse()
    {
        $payloadResponse = [
            'ok'     => true,
            'error'  => null,
            'result' => []
        ];

        $serializedPayload = $this->serializer->deserializePayloadResponse($payloadResponse, 'CL\Slack\Tests\Payload\MockPayloadResponse');

        $this->assertInstanceOf('CL\Slack\Payload\PayloadResponseInterface', $serializedPayload);
        $this->assertTrue($serializedPayload->isOk());
        $this->assertNull($serializedPayload->getError());
        $this->assertNull($serializedPayload->getErrorExplanation());
    }
}
