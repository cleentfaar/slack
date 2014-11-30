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

class PayloadRegistry
{
    /**
     * @var PayloadInterface[]
     */
    private $payloads = [];

    /**
     * @param PayloadInterface $payload
     *
     * @throws \InvalidArgumentException If the given payload's method has already been registered
     */
    public function register(PayloadInterface $payload)
    {
        if (array_key_exists($payload->getMethod(), $this->payloads)) {
            throw new \InvalidArgumentException(sprintf(
                'Already registered a payload for this method: %s',
                $payload->getMethod()
            ));
        }

        $this->payloads[$payload->getMethod()] = $payload;
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
