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
 * @link Official documentation at https://api.slack.com/types/channel
 */
class Channel extends SimpleChannel
{
    /**
     * @var SimpleMessage
     */
    private $latest;

    /**
     * @var string
     */
    private $lastRead;

    /**
     * @var bool
     */
    private $isMember;

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
     * @return string The ID of this channel.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string The name of the channel, without a leading hash sign.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return SimpleMessage The latest message in the channel.
     */
    public function getLatest()
    {
        return $this->latest;
    }

    /**
     * @return string The Slack timestamp for the last message the calling user has read in this channel.
     */
    public function getLastRead()
    {
        return $this->lastRead;
    }

    /**
     * @return \DateTime The date/time on which this channel was created.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return string The user ID of the member that created this channel.
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return bool True if this channel has been archived, false otherwise.
     */
    public function isArchived()
    {
        return $this->isArchived;
    }

    /**
     * @return bool Returns true if this channel is the "general" channel that includes all regular team members,
     *              false otherwise. In most teams this is called #general but some teams have renamed it.
     */
    public function isGeneral()
    {
        return $this->isGeneral;
    }

    /**
     * @return bool Will be true if the calling member is part of the channel.
     */
    public function isMember()
    {
        return $this->isMember;
    }

    /**
     * @return array A list of user ids for all users in this channel.
     *               This includes any disabled accounts that were in this channel when they were disabled.
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return Customizable Information about the channel's topic.
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return Customizable Information about the channel's purpose.
     */
    public function getPurpose()
    {
        return $this->purpose;
    }
}
