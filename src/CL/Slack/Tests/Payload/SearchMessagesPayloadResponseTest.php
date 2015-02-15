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

use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Payload\SearchMessagesPayloadResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessagesPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'messages' => $this->createMessageResult(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                         $responseData
     * @param SearchMessagesPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $fileResult = $payloadResponse->getResult();

        $this->assertInstanceOf('CL\Slack\Model\MessageResult', $fileResult);
        $this->assertCount(1, $fileResult->getMatches());

        foreach ($fileResult->getMatches() as $x => $match) {
            $this->assertMessageResultItem($responseData['messages']['matches'][$x], $match);
        }
    }
}
