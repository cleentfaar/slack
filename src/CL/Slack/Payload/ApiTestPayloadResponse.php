<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiTestPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var array
     */
    protected $args = [];

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->args;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getArgument($key)
    {
        if (!array_key_exists($key, $this->args)) {
            throw new \InvalidArgumentException(sprintf('There is no argument with that name: "%s"', $key));
        }

        return $this->args[$key];
    }
}
