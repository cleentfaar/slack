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

use CL\Slack\Payload;
use CL\Slack\Test\MockPayload;
use CL\Slack\Tests\AbstractTestCase;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadRegistryTest extends AbstractTestCase
{
    /**
     * @var PayloadRegistry
     */
    private $payloadRegistry;

    protected function setUp()
    {
        $this->payloadRegistry = new PayloadRegistry();
    }

    public function testRegisterNew()
    {
        $payload = new MockPayload();

        $this->payloadRegistry->register($payload);

        $this->assertEquals($payload, $this->payloadRegistry->get($payload->getMethod()));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Already registered a payload for this method: mock
     */
    public function testRegisterExisting()
    {
        $payload = new MockPayload();

        $this->payloadRegistry->register($payload);

        // 2nd time with same payload should throw exception
        $this->payloadRegistry->register($payload);
    }

    public function testHasTrue()
    {
        $payload = new MockPayload();

        $this->payloadRegistry->register($payload);

        $this->assertTrue($this->payloadRegistry->has($payload->getMethod()));
    }

    public function testHasFalse()
    {
        $this->assertFalse($this->payloadRegistry->has('foo'));
    }

    public function testGetExisting()
    {
        $payload = new MockPayload();

        $this->payloadRegistry->register($payload);
        $this->assertInstanceOf('CL\Slack\Payload\PayloadInterface', $this->payloadRegistry->get($payload->getMethod()));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage There is no payload available for that method (foo)
     */
    public function testGetUnknown()
    {
        $this->payloadRegistry->get('foo');
    }
}
