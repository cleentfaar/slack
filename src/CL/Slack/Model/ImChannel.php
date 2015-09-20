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
 * @link Official documentation at https://api.slack.com/types/im
 */
class ImChannel extends AbstractModel
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var bool
     */
    private $isIm;

    /**
     * @var bool
     */
    private $isUserDeleted;

    /**
     * @var string
     */
    private $user;

    /**
     * @return string The ID of this channel.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime The date/time on which this channel was created.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return bool
     */
    public function isIm()
    {
        return $this->isIm;
    }

    /**
     * @return bool
     */
    public function isUserDeleted()
    {
        return $this->isUserDeleted;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user;
    }
}
