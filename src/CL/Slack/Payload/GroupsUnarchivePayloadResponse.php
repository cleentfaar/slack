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
class GroupsUnarchivePayloadResponse extends AbstractPayloadResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getPossibleErrors()
    {
        return array_merge(parent::getPossibleErrors(), [
            'not_archived' => 'Group is not archived',
        ]);
    }
}
