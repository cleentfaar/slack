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

use CL\Slack\Payload\ChatDeletePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatDeletePayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'channel' => 'C1234567',
            'ts' => '12345678.12345678',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                     $responseData
     * @param ChatDeletePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($responseData['channel'], $payloadResponse->getChannelId());
        $this->assertEquals($responseData['ts'], $payloadResponse->getSlackTimestamp());
    }
}
