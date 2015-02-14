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

use CL\Slack\Model\GroupWithState;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsCreatePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var GroupWithState|null
     */
    private $group;

    /**
     * @return GroupWithState|null
     */
    public function getGroup()
    {
        return $this->group;
    }
}
