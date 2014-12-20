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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Member extends AbstractModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $color;

    /**
     * @var MemberProfile|null
     *
     * @Serializer\Type("CL\Slack\Model\MemberProfile")
     */
    private $profile;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     */
    private $isAdmin;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     */
    private $isBot;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     */
    private $isRestricted;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     */
    private $isUltraRestricted;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     */
    private $deleted;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
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
