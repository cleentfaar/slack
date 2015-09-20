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
 *
 * @link Official documentation at https://api.slack.com/methods/groups.kick
 */
class GroupsKickPayload extends AbstractPayload
{
    /**
     * Slack seems to want to call this option "channel", but I can't agree with that (the format of the value is different),
     * and will just pretend to my users it's a "group" (ID).
     *
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $user;

    /**
     * @param string $groupId ID of the group to kick the user from
     */
    public function setGroupId($groupId)
    {
        $this->channel = $groupId;
    }

    /**
     * @return string ID of the group to kick the user from
     */
    public function getGroupId()
    {
        return $this->channel;
    }

    /**
     * @param string $userId ID of the user to kick from group
     */
    public function setUserId($userId)
    {
        $this->user = $userId;
    }

    /**
     * @return string ID of the user to kick from group
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'groups.kick';
    }
}
