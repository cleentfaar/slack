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
class MemberProfile extends AbstractModel
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $realName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $skype;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $phone;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $image24;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $image32;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $image48;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $image72;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
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
