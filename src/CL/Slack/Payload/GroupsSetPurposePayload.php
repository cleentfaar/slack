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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/groups.setPurpose
 */
class GroupsSetPurposePayload extends AbstractPostPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $channel;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $purpose;

    /**
     * @param string $groupId ID of the group to remove user from
     */
    public function setGroupId($groupId)
    {
        $this->channel = $groupId;
    }

    /**
     * @return string ID of the group to remove user from
     */
    public function getGroupId()
    {
        return $this->channel;
    }

    /**
     * @param string $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'groups.setPurpose';
    }
}
