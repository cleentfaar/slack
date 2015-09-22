<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use CL\Slack\Model\User;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersInfoPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var User|null
     */
    private $user;

    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
