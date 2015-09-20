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
class GroupsClosePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var bool
     */
    private $noOp;

    /**
     * @var bool
     */
    private $alreadyClosed;

    /**
     * @return bool
     */
    public function isAlreadyClosed()
    {
        return $this->alreadyClosed;
    }

    /**
     * @return bool
     */
    public function isNoOp()
    {
        return $this->noOp;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPossibleErrors()
    {
        return array_merge(parent::getPossibleErrors(), [
            'channel_not_found' => 'Value passed for group was invalid',
            'already_archived' => 'Group has already been archived',
            'group_contains_others' => 'Restricted accounts cannot archive groups containing others',
            'last_ra_channel' => 'You cannot archive the last channel for a restricted account',
            'restricted_action' => 'A team preference prevents authenticated user from archiving',
        ]);
    }
}
