<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsLeavePayloadResponse extends AbstractPayloadResponse
{
    protected function getPossibleErrors()
    {
        return array_merge(parent::getPossibleErrors(), [
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
