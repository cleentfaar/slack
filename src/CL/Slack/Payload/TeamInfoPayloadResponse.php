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

use CL\Slack\Model\Team;

/**
 * @author Nic Malan <nicmalan@gmail.com>
 */
class TeamInfoPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Team|null
     */
    private $team;

    /**
     * @return Team|null
     */
    public function getTeam()
    {
        return $this->team;
    }
}
