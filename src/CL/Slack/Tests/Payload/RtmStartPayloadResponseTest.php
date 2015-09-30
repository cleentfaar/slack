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

use CL\Slack\Payload\RtmStartPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class RtmStartPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'url' => 'wss://ms111.slack-msgs.com/websocket/',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                   $responseData
     * @param RtmTestPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($payloadResponse->getUrl(), $responseData['url']);
    }
}
