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
 * @author Nic Malan <nicmalan@gmail.com>
 *
 * @link Official documentation at https://api.slack.com/types
 */
class Team extends AbstractModel
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
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $emailDomain;

    /**
     * @var string|null
     */
    private $image34;

    /**
     * @var string|null
     */
    private $image44;

    /**
     * @var string|null
     */
    private $image68;

    /**
     * @var string|null
     */
    private $image88;

    /**
     * @var string|null
     */
    private $image102;

    /**
     * @var string|null
     */
    private $image132;

    /**
     * @return string The ID of this team.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string The name of this team.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string The domain of this team.
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return string The email domain of this team.
     */
    public function getEmailDomain()
    {
        return $this->emailDomain;
    }

    /**
     * @return string The image 34 of this team.
     */
    public function getImage34()
    {
        return $this->image34;
    }

    /**
     * @return string The image 44 of this team.
     */
    public function getImage44()
    {
        return $this->image44;
    }

    /**
     * @return string The image 68 of this team.
     */
    public function getImage68()
    {
        return $this->image68;
    }

    /**
     * @return string The image 88 of this team.
     */
    public function getImage88()
    {
        return $this->image88;
    }

    /**
     * @return string The image 102 of this team.
     */
    public function getImage102()
    {
        return $this->image102;
    }

    /**
     * @return string The image 132 of this team.
     */
    public function getImage132()
    {
        return $this->image132;
    }
}
