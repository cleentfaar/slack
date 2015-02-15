<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Test\Transport;

use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Serializer\PayloadResponseSerializer;
use CL\Slack\Tests\Payload\AbstractPayloadResponseTest;

class MockApiClient
{
    /**
     * @var PayloadResponseSerializer
     */
    private $payloadResponseSerializer;

    public function __construct()
    {
        $this->payloadResponseSerializer = new PayloadResponseSerializer();
    }

    /**
     * @param PayloadInterface $payload
     *
     * @return PayloadResponseInterface
     */
    public function sendWithSuccess(PayloadInterface $payload)
    {
        $payloadBaseName          = (new \ReflectionClass($payload))->getShortName();
        $payloadResponseTestClass = sprintf('CL\Slack\Tests\Payload\%sResponseTest', $payloadBaseName);

        /** @var AbstractPayloadResponseTest $payloadResponseTestObject */
        $payloadResponseTestObject = new $payloadResponseTestClass();

        $responseData = array_merge(
            $payloadResponseTestObject->createResponseData(),
            ['ok' => true]
        );

        return $this->payloadResponseSerializer->deserialize(
            $responseData,
            $this->getResponseClass($payload)
        );
    }

    /**
     * @param PayloadInterface $payload
     *
     * @return PayloadResponseInterface
     */
    public function sendWithFailure(PayloadInterface $payload)
    {
        $responseData = ['ok' => false, 'error' => 'faked.error'];

        return $this->payloadResponseSerializer->deserialize($responseData, $this->getResponseClass($payload));
    }

    /**
     * @param PayloadInterface $payload
     *
     * @return string
     */
    private function getResponseClass(PayloadInterface $payload)
    {
        $payloadBaseName      = (new \ReflectionClass($payload))->getShortName();
        $payloadResponseClass = sprintf('CL\Slack\Payload\%sResponse', $payloadBaseName);

        return $payloadResponseClass;
    }
}
