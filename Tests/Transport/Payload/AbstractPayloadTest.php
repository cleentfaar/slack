<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport\Payload;

use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\Payload\PayloadInterface;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadTest extends AbstractTestCase
{
    /**
     * @var PayloadInterface
     */
    protected $payload;

    /**
     * @var array
     */
    protected $expectedData;

    protected function setUp()
    {
        $this->payload      = $this->buildPayload();
        $this->expectedData = $this->getExpectedPayloadData();
    }

    public function testCreate()
    {
        $this->assertEquals($this->expectedData, $this->payload->create());
    }

    /**
     * @return PayloadInterface
     */
    abstract public function buildPayload();

    /**
     * @return array
     */
    abstract protected function getExpectedPayloadData();
}
