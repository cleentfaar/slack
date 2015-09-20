<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\ChatUpdatePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatUpdatePayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'channel' => 'C1234567',
            'ts' => '12345678.12345678',
            'text' => 'Hello World!',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                     $responseData
     * @param ChatUpdatePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($responseData['channel'], $payloadResponse->getChannelId());
        $this->assertEquals($responseData['ts'], $payloadResponse->getSlackTimestamp());
        $this->assertEquals($responseData['text'], $payloadResponse->getText());
    }
}
