<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Test\Payload;

use CL\Slack\Payload\AbstractPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class MockPayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $foo;

    /**
     * @param string $foo
     */
    public function setFoo($foo)
    {
        $this->foo = $foo;
    }

    public function getMethod()
    {
        return 'mock';
    }

    public function getResponseClass()
    {
        return 'CL\Slack\Test\Payload\MockPayloadResponse';
    }
}
