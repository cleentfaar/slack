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

use CL\Slack\Model\Member;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Member[]
     *
     * @Serializer\Type("array<CL\Slack\Model\Member>")
     */
    private $members;

    /**
     * @return Member[] Contains 1 or more members of the team, in no particular order. For deactivated users,
     *                  deleted will be true. The color field is used in some clients to display a colored username.
     */
    public function getUsers()
    {
        return $this->members;
    }
}
