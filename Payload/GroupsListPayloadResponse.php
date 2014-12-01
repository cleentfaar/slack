<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use CL\Slack\Model\Group;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Group[]
     *
     * @Serializer\Type("array<CL\Slack\Model\Group>")
     */
    private $groups;

    /**
     * @return Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
