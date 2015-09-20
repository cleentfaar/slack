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
use CL\Slack\Serializer\PayloadResponseSerializer;
use CL\Slack\Tests\AbstractTestCase;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadResponseTest extends AbstractTestCase
{
    /**
     * @var PayloadResponseSerializer
     */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = new PayloadResponseSerializer();
    }

    /**
     * @test
     */
    public function it_can_be_deserialized()
    {
        $responseData = array_merge(['ok' => true], $this->createResponseData());

        /** @var PayloadResponseInterface $actualPayloadResponse */
        $actualPayloadResponse = $this->serializer->deserialize(
            $responseData,
            $this->getResponseClass()
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
     * Returns the response class used for this test-case
     * Can be overwritten if it deviates from the standard pattern.
     */
    protected function getResponseClass()
    {
        $class = get_class($this);
        $name = substr($class, strripos($class, '\\') + 1, -4);

        return sprintf('CL\Slack\Payload\%s', $name);
    }

    /**
     * Compares the expected response data against the values returned by the actual Response's methods.
     *
     * @param array                    $responseData
     * @param PayloadResponseInterface $payloadResponse
     */
    abstract protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse);

    /**
     * Returns the data used for comparison against the actual Response class.
     *
     * @return array
     */
    abstract public function createResponseData();
}
