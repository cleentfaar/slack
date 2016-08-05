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

use CL\Slack\Payload\GroupsInvitePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsInvitePayloadResponseTest extends AbstractPayloadResponseTestCase
{
    /**
     * @inheritdoc
     */
    public function createResponseData()
    {
        return [
            'group' => $this->createGroup(),
            'already_in_group' => true,
        ];
    }

    /**
     * @inheritdoc
     *
     * @param array                       $responseData
     * @param GroupsInvitePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertGroup($responseData['group'], $payloadResponse->getGroup());
        $this->assertEquals($responseData['already_in_group'], $payloadResponse->isAlreadyInGroup());
    }
}
