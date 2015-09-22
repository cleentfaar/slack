<?php

/*
 * This user is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * user that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Travis Raup <info@travisraup.com>
 *
 * @link Official documentation at https://api.slack.com/methods/users.getPresence
 */
class UsersGetPresencePayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $user;

    /**
     * @param string $user
     */
    public function setUserId($user)
    {
        $this->user = $user;
    }

    /**
     * @return string ID of the user to get info on
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'users.getPresence';
    }
}
