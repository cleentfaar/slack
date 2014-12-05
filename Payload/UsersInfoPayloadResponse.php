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

use CL\Slack\Model\Member;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersInfoPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var Member|null
     *
     * @Serializer\Type("CL\Slack\Model\Member")
     */
    private $user;

    /**
     * @return Member|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
