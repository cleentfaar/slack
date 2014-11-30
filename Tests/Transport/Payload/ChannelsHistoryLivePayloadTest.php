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

use CL\Slack\Transport\Payload\AuthTestPayload;
use CL\Slack\Transport\Payload\ChannelsHistoryPayload;
use CL\Slack\Transport\Payload\Response\ChannelsHistoryPayloadResponse;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsHistoryLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return AuthTestPayload
     */
    public function buildPayload()
    {
        if (null === $channelId = getenv('CL_SLACK_LIVE_TESTING_GENERAL_CHANNEL_ID')) {
            throw new \LogicException(
                'Can\'t execute live tests for the channels-history payload; ' .
                'you need to configure the CL_SLACK_LIVE_TESTING_GENERAL_CHANNEL_ID environment variable first'
            );
        }

        $payload = new ChannelsHistoryPayload();
        $payload->setChannelId($channelId);

        return $payload;
    }

    /**
     * @param ChannelsHistoryPayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\ChannelsHistoryPayloadResponse', $response);
        $this->assertInternalType('boolean', $response->getHasMore(), 'The option has_more should be of type "boolean"');
        $this->assertInternalType('array', $response->getMessages(), 'The "messages" should be of type "array"');

        foreach ($response->getMessages() as $message) {
            $this->assertInstanceOf('\CL\Slack\Model\SimpleMessage', $message, 'Messages should be instances of the correct class');
        }
    }
}
