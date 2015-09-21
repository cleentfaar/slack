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
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersGetPresencePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string
     */
    private $presence;

    /**
     * @return string
     */
    public function getPresence()
    {
        return $this->presence;
    }
}
