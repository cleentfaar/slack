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

use CL\Slack\Transport\Payload\ChannelsInfoPayload;
use CL\Slack\Transport\Payload\Response\ChannelsInfoPayloadResponse;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInfoLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return ChannelsInfoPayload
     */
    public function buildPayload()
    {
        if (null === $channelId = getenv('CL_SLACK_LIVE_TESTING_GENERAL_CHANNEL_ID')) {
            throw new \LogicException(
                'Can\'t execute live tests for the channels-info payload; ' .
                'you need to configure the CL_SLACK_LIVE_TESTING_GENERAL_CHANNEL_ID environment variable first'
            );
        }

        $payload = new ChannelsInfoPayload();
        $payload->setChannelId($channelId);

        return $payload;
    }

    /**
     * @param ChannelsInfoPayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\ChannelsInfoPayloadResponse', $response);
        $this->assertInstanceOf('\CL\Slack\Model\Channel', $response->getChannel(), 'The channel should be an instance of the correct class');
        $this->assertEquals('general', $response->getChannel()->getName(), 'The channel name should be correct');
    }
}
