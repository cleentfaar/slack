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
class UserProfile extends AbstractModel
{
    /**
     * @var string|null
     */
    private $realName;

    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

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
    private $email;

    /**
     * @var string|null
     */
    private $image24;

    /**
     * @var string|null
     */
    private $image32;

    /**
     * @var string|null
     */
    private $image48;

    /**
     * @var string|null
     */
    private $image72;

    /**
     * @var string|null
     */
    private $image192;

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getImage192()
    {
        return $this->image192;
    }

    /**
     * @return string|null
     */
    public function getImage24()
    {
        return $this->image24;
    }

    /**
     * @return string|null
     */
    public function getImage32()
    {
        return $this->image32;
    }

    /**
     * @return string|null
     */
    public function getImage48()
    {
        return $this->image48;
    }

    /**
     * @return string|null
     */
    public function getImage72()
    {
        return $this->image72;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @return string|null
     */
    public function getSkype()
    {
        return $this->skype;
    }
}
