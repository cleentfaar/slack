<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Travis Raup <info@travisraup.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use CL\Slack\Model\Group;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
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
