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

use CL\Slack\Model\GroupWithState;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsCreatePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var GroupWithState|null
     *
     * @Serializer\Type("CL\Slack\Model\GroupWithState")
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
