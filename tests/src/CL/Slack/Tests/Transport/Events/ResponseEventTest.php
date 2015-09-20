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
use CL\Slack\Transport\Events\ResponseEvent;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ResponseEventTest extends AbstractTestCase
{
    /**
     * @return array
     */
    public function testGetRawPayloadResponse()
    {
        $expectedPayloadResponse = [];
        $event                   = new ResponseEvent($expectedPayloadResponse);
        $actualPayloadResponse   = $event->getRawPayloadResponse();

        $this->assertEquals($expectedPayloadResponse, $actualPayloadResponse);
    }
}
