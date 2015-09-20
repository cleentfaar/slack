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

use CL\Slack\Payload\ChannelsListPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsListPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'channels' => [
                $this->createChannel(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                       $responseData
     * @param ChannelsListPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $channels = $payloadResponse->getChannels();

        $this->assertCount(1, $channels);

        foreach ($channels as $x => $channel) {
            $this->assertChannel($responseData['channels'][$x], $channel);
        }
    }
}
