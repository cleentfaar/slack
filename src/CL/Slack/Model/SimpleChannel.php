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
class SimpleChannel extends AbstractModel
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $creator;

    /**
     * @var bool
     */
    protected $isArchived;

    /**
     * @var bool
     */
    protected $isGeneral;

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
}
