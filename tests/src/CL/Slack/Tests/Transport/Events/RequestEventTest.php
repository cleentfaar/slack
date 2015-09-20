<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport\Events;

use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\Events\RequestEvent;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class RequestEventTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function it_can_return_a_raw_payload()
    {
        $expectedPayload = [];
        $event = new RequestEvent($expectedPayload);
        $actualPayload = $event->getRawPayload();

        $this->assertEquals($expectedPayload, $actualPayload);
    }
}
