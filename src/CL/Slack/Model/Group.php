<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/types/group
 */
class Group extends AbstractModel
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var string
     */
    private $creator;

    /**
     * @var bool
     */
    private $isArchived;

    /**
     * @var array<string>
     */
    private $members = [];

    /**
     * @var Customizable
     */
    private $topic;

    /**
     * @var Customizable
     */
    private $purpose;

    /**
     * @var bool
     */
    private $isGroup = true;

    /**
     * @var string
     */
    private $lastRead;

    /**
     * @var Message
     */
    private $latest;

    /**
     * @var int
     */
    private $unreadCount;

    /**
     * @var int
     */
    private $unreadCountDisplay;

    /**
     * @return string The ID of this group.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string The name of the group, without a leading hash sign.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTime The date/time on which this group was created.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return string The user ID of the member that created this group.
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return bool True if this group has been archived, false otherwise.
     */
    public function isArchived()
    {
        return $this->isArchived;
    }

    /**
     * @return array A list of user ids for all users in this group.
     *               This includes any disabled accounts that were in this group when they were disabled.
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return Customizable Information about the group's topic.
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return Customizable Information about the group's purpose.
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @return bool
     */
    public function isGroup()
    {
        return $this->isGroup;
    }

    /**
     * @return string
     */
    public function getLastRead()
    {
        return $this->lastRead;
    }

    /**
     * @return Message
     */
    public function getLatest()
    {
        return $this->latest;
    }

    /**
     * @return int
     */
    public function getUnreadCount()
    {
        return $this->unreadCount;
    }

    /**
     * @return int
     */
    public function getUnreadCountDisplay()
    {
        return $this->unreadCountDisplay;
    }
}
