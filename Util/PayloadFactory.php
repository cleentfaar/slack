<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Util;

use CL\Slack\Payload\PayloadInterface;

class PayloadFactory
{
    /**
    public function __construct(PayloadRegistry $payloadRegistry)
    {

    }

    public static function create($method, array $payload)
    {
    }

    /**
     * @param string $method
     *
     * @return bool
     */
    public function has($method)
    {
        return array_key_exists($method, $this->payloads);
    }

    /**
     * @param string $method
     *
     * @return PayloadInterface
     */
    public function get($method)
    {
        if (!array_key_exists($method, $this->payloads)) {
            throw new \InvalidArgumentException(sprintf(
                'There is no payload available for that method (%s), available methods are: %s',
                $method,
                implode(', ', array_keys($this->payloads))
            ));
        }

        return $this->payloads[$method];
    }
}
