<?php

/*
 * This file is part of the CLSlackBundle.
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
    protected function getOwnErrors()
    {
        return [
            'not_archived' => 'Channel is not archived',
        ];
    }
}
