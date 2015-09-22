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

use CL\Slack\Model\Group;

/**
 * @author Travis Raup <info@travisraup.com>
 */
class GroupsInfoPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Group|null
     */
    private $group;

    /**
     * @return Group|null
     */
    public function getGroup()
    {
        return $this->group;
    }
}
