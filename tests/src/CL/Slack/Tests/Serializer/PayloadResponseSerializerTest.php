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

use CL\Slack\Serializer\PayloadResponseSerializer;
use CL\Slack\Test\Payload\MockPayloadResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadResponseSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PayloadResponseSerializer
     */
    private $payloadResponseSerializer;

    protected function setUp()
    {
        $this->payloadResponseSerializer = new PayloadResponseSerializer();
    }

    /**
     * @test
     */
    public function it_can_be_deserialized()
    {
        $payloadResponse = [
            'ok' => true,
            'error' => null,
            'result' => [],
        ];

        $mockResponseClass = MockPayloadResponse::class;
        $serializedPayload = $this->payloadResponseSerializer->deserialize(
            $payloadResponse,
            $mockResponseClass
        );

        $this->assertInstanceOf($mockResponseClass, $serializedPayload);
        $this->assertTrue($serializedPayload->isOk());
        $this->assertNull($serializedPayload->getError());
        $this->assertNull($serializedPayload->getErrorExplanation());
    }
}
