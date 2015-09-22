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

/**
 * @author Travis Raup <info@travisraup.com>
 */
class UsersGetPresencePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Presence|null
     */
    private $presence;

    /**
     * @return Presence|null
     */
    public function getPresence()
    {
        return $this->presence;
    }
}
