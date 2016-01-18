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

use CL\Slack\Payload\GroupsClosePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsClosePayloadResponseTest extends AbstractPayloadResponseTestCase
{
    /**
     * @inheritdoc
     */
    public function createResponseData()
    {
        return [
            'no_op' => true,
            'already_closed' => true,
        ];
    }

    /**
     * @inheritdoc
     *
     * @param array                      $responseData
     * @param GroupsClosePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($responseData['no_op'], $payloadResponse->isNoOp());
        $this->assertEquals($responseData['already_closed'], $payloadResponse->isAlreadyClosed());
    }

    /**
     * @inheritdoc
     */
    protected function getErrorExplanations()
    {
        return array_merge(parent::getErrorExplanations(), [
            'channel_not_found' => 'Value passed for group was invalid',
            'already_archived' => 'Group has already been archived',
            'group_contains_others' => 'Restricted accounts cannot archive groups containing others',
            'last_ra_channel' => 'You cannot archive the last channel for a restricted account',
            'restricted_action' => 'A team preference prevents authenticated user from archiving',
        ]);
    }
}
