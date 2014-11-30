<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use JMS\Serializer\Annotation as Serializer;

/**
 * Payload that triggers the api.test-method; allowing you to test a connection with the Slack API.
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see    Official documentation at https://api.slack.com/methods/api.test
 */
class ApiTestPayload extends AbstractPayload
{
    /**
     * @var array
     *
     * @Serializer\Type("array<string, string>")
     * @Serializer\Inline
     */
    private $arguments = [];

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $error;
    
    /**
     * @param array $arguments
     */
    public function replaceArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function addArgument($key, $value)
    {
        $this->arguments[$key] = $value;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param string|null $error Error response to return
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return string|null Error response to return
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'api.test';
    }
}
