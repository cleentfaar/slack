<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Serializer;

use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadResponseSerializer extends AbstractSerializer
{
    /**
     * @param array  $payloadResponse
     * @param string $payloadResponseClass
     *
     * @return PayloadResponseInterface
     */
    public function deserialize(array $payloadResponse, $payloadResponseClass)
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
                is_object($payloadResponseObject) ? 'instance of ' . get_class($payloadResponseObject) : gettype($payloadResponseObject)
            ));
        }

        return $payloadResponseObject;
    }
}
