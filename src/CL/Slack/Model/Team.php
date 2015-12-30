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
     * @var array
     */
    private $icon;

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
     * @return array of icons
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
