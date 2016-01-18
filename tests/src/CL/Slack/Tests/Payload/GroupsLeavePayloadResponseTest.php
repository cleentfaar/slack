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

use CL\Slack\Payload\GroupsLeavePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsLeavePayloadResponseTest extends AbstractPayloadResponseTestCase
{
    /**
     * @inheritdoc
     */
    public function createResponseData()
    {
        return [];
    }

    /**
     * @inheritdoc
     *
     * @param array                      $responseData
     * @param GroupsLeavePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
    }

    /**
     * @inheritdoc
     */
    protected function getErrorExplanations()
    {
        return array_merge(parent::getErrorExplanations(), [
            'account_inactive' => 'Authentication token is for a deleted user or team',
            'cant_leave_last_channel' => 'Authenticated user cannot leave the last channel they are in',
            'channel_not_found' => 'Value passed for channel was invalid',
            'invalid_auth' => 'Invalid authentication token',
            'is_archived' => 'Group has been archived',
            'last_member' => 'Authenticated user is the last member of a group and cannot leave it',
            'not_authed' => 'No authentication token provided',
        ]);
    }
}
