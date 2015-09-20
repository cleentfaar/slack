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

use CL\Slack\Payload\ChannelsJoinPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsJoinPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'already_in_channel' => true,
            'channel' => $this->createChannel(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                       $responseData
     * @param ChannelsJoinPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertChannel($responseData['channel'], $payloadResponse->getChannel());
        $this->assertEquals($responseData['already_in_channel'], $payloadResponse->isAlreadyInChannel());
    }
}
