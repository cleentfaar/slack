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
        $payload = $this->getMock('CL\Slack\Payload\PayloadInterface');
        $payload->expects($this->any())->method('getMethod')->willReturn('foo.bar');

        $this->payloadRegistry->register($payload);

        $this->assertEquals($payload, $this->payloadRegistry->get('foo.bar'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Already registered a payload for this method: foo.bar
     */
    public function testRegisterExisting()
    {
        $payload = $this->getMock('CL\Slack\Payload\PayloadInterface');
        $payload->expects($this->any())->method('getMethod')->willReturn('foo.bar');

        $this->payloadRegistry->register($payload);

        // 2nd time with same payload should throw exception
        $this->payloadRegistry->register($payload);
    }

    public function testHasTrue()
    {
        $payload = $this->getMock('CL\Slack\Payload\PayloadInterface');
        $payload->expects($this->any())->method('getMethod')->willReturn('foo.bar');

        $this->payloadRegistry->register($payload);

        $this->assertTrue($this->payloadRegistry->has('foo.bar'));
    }

    public function testHasFalse()
    {
        $this->assertFalse($this->payloadRegistry->has('foo.bar'));
    }

    public function testGetExisting()
    {
        $payload = $this->getMock('CL\Slack\Payload\PayloadInterface');
        $payload->expects($this->any())->method('getMethod')->willReturn('foo.bar');

        $this->payloadRegistry->register($payload);
        $this->assertInstanceOf('CL\Slack\Payload\PayloadInterface', $this->payloadRegistry->get('foo.bar'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage There is no payload available for that method (foo.bar)
     */
    public function testGetUnknown()
    {
        $this->payloadRegistry->get('foo.bar');
    }
}
