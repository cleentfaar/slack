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

use CL\Slack\Payload\ImListPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ImListPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'channels' => [
                $this->createImChannel(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                 $responseData
     * @param ImListPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $channels = $payloadResponse->getImChannels();

        $this->assertCount(1, $channels);

        foreach ($channels as $x => $channel) {
            $this->assertImChannel($responseData['channels'][$x], $channel);
        }
    }
}
