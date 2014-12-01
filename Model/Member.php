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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Member extends AbstractModel
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
    private $realName;

    /**
     * @var string|null
     */
    private $skype;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var string|null
     */
    private $tz;

    /**
     * @var string|null
     */
    private $tzLabel;

    /**
     * @var string|null
     */
    private $tzOffset;

    /**
     * @var MemberProfile|null
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
     * @return string|null The real name of the user, or null if there isn't one set
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @return string|null The skype name of the user, or null if there isn't one set
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * @return string|null The phone number of the user, or null if there isn't one set
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string|null Status of the user, or null if not applicable
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string|null Hexadecimal colorcode used in some clients to display a colored username.
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string|null Timezone of the user (if set), e.g. "Europe/Amsterdam", null otherwise
     */
    public function getTimezone()
    {
        return $this->tz;
    }

    /**
     * @return string|null Timezone label of the user (if set), e.g. "Central European Summer Time", null otherwise
     */
    public function getTimezoneLabel()
    {
        return $this->tzLabel;
    }

    /**
     * @return int|null Timezone offset of the user (if set), e.g. 7200, null otherwise
     */
    public function getTimezoneOffset()
    {
        return $this->tzOffset;
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
