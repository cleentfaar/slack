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
 * @link Official documentation at https://api.slack.com/methods/groups.create
 */
class GroupsCreateChildPayload extends AbstractPayload
{
    /**
     * Slack seems to want to call this option "channel", but I can't agree with that (the format of the value is different),
     * and will just pretend to my users it's a "group" (ID).
     *
     * @var string
     */
    private $channel;

    /**
     * @param string $groupId ID of the group to clone and archive.
     */
    public function setGroupId($groupId)
    {
        $this->channel = $groupId;
    }

    /**
     * @return string ID of the group to clone and archive.
     */
    public function getGroupId()
    {
        return $this->channel;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'groups.createChild';
    }
}
