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
 * @link Official documentation at https://api.slack.com/types/user
 */
class User extends AbstractModel
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
     * @var string|null
     */
    private $color;

    /**
     * @var UserProfile|null
     */
    private $profile;

    /**
     * @var bool|null
     */
    private $isAdmin;

    /**
     * @var bool|null
     */
    private $isBot;

    /**
     * @var bool|null
     */
    private $isRestricted;

    /**
     * @var bool|null
     */
    private $isUltraRestricted;

    /**
     * @var bool|null
     */
    private $deleted;

    /**
     * @var bool|null
     */
    private $hasFiles;

    /**
     * @return string The ID of this member.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string The (user)name of this member
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null Hexadecimal colorcode used in some clients to display a colored username.
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return MemberProfile The profile object for this member
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return bool True if the user has been given the admin role, false otherwise.
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @return bool True if the user is a bot, false otherwise.
     */
    public function isBot()
    {
        return $this->isBot;
    }

    /**
     * @return bool True if the user has restrictions applied, false otherwise.
     */
    public function isRestricted()
    {
        return $this->isRestricted;
    }

    /**
     * @return bool True if the user has ultra restrictions applied, false otherwise.
     */
    public function isUltraRestricted()
    {
        return $this->isUltraRestricted;
    }

    /**
     * @return bool True if the user has been deactivated.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @return bool True if the user has added files to the Slack instance, false otherwise.
     */
    public function hasFiles()
    {
        return $this->hasFiles;
    }
}
