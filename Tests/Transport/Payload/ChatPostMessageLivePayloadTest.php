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

use CL\Slack\Transport\Payload\ChatPostMessagePayload;
use CL\Slack\Transport\Payload\Response\ChatPostMessagePayloadResponse;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatPostMessageLivePayloadTest extends AbstractLivePayloadTest
{
    protected function setUp()
    {
        $this->markTestSkipped('Not posting messages during live tests for sanity reasons');
    }
    
    /**
     * @return ChatPostMessagePayload
     */
    public function buildPayload()
    {
        $payload = new ChatPostMessagePayload();
        $payload->setChannel('#general');
        $payload->setMessage('Hello world!');
        $payload->setIconEmoji('skull');

        return $payload;
    }

    /**
     * @param ChatPostMessagePayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\ChatPostMessagePayloadResponse', $response);

        // unfortunately, the channel is not returned in the same format (name) as indicated by the payload
        // that's why we can't do an assertEquals()-test here
        $this->assertInternalType('string', $response->getChannel());
        
        $this->assertInternalType('float', $response->getTimestamp());
    }
}
