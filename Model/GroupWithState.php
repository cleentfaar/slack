<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupWithState extends Group
{
    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $lastRead;

    /**
     * @var SimpleMessage|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleMessage")
     */
    private $latest;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    private $isOpen;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $unreadCount;

    /**
     * @return float The Slack timestamp for the last message the calling user has read in this group.
     */
    public function getLastRead()
    {
        return $this->lastRead;
    }

    /**
     * @return SimpleMessage|null
     */
    public function getLatest()
    {
        return $this->latest;
    }

    /**
     * @return boolean
     */
    public function isOpen()
    {
        return $this->isOpen;
    }

    /**
     * @return int
     */
    public function getUnreadCount()
    {
        return $this->unreadCount;
    }
}
