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

use CL\Slack\Payload\GroupsHistoryPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsHistoryPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'messages' => [
                $this->createSimpleMessage(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                        $responseData
     * @param GroupsHistoryPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $messages = $payloadResponse->getMessages();

        $this->assertCount(1, $messages);

        foreach ($messages as $x => $message) {
            $this->assertSimpleMessage($responseData['messages'][$x], $message);
        }
    }
}
