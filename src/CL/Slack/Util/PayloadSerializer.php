<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Util;

use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\PayloadResponseInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadSerializer
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param SerializerInterface|null $serializer
     */
    public function __construct(SerializerInterface $serializer = null)
    {
        $this->serializer = $serializer ?: SerializerBuilder::create()->build();
    }

    /**
     * @param PayloadInterface $payload
     *
     * @return array The serialized payload data
     */
    public function serializePayload(PayloadInterface $payload)
    {
        $serializedPayload = $this->serializer->serialize($payload, 'json');
        if (!$serializedPayload || !is_string($serializedPayload)) {
            throw new \RuntimeException(sprintf(
                'Failed to serialize payload; expected it to be a string, got: %s',
                var_export($serializedPayload, true)
            ));
        }

        return json_decode($serializedPayload, true);
    }

    /**
     * @param array  $payloadResponse
     * @param string $payloadResponseClass
     *
     * @return PayloadResponseInterface
     */
    public function deserializePayloadResponse(array $payloadResponse, $payloadResponseClass)
    {
        $payloadResponseObject = $this->serializer->deserialize(
            json_encode($payloadResponse),
            $payloadResponseClass,
            'json'
        );

        if (!($payloadResponseObject instanceof PayloadResponseInterface)) {
            throw new \RuntimeException(sprintf(
                'The serializer expected the response data to be converted into an instance of "%s", got: %s',
                $payloadResponseClass,
                gettype($payloadResponse) == 'object' ? get_class($payloadResponse) : gettype($payloadResponse)
            ));
        }

        return $payloadResponseObject;
    }
}
