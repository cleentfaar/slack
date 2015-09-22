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
 * @author Travis Raup <info@travisraup.com>
 *
 * @link Official documentation at https://api.slack.com/methods/groups.info
 */
class GroupsInfoPayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $channel;

    /**
     * @param string $channelId
     */
    public function setGroupId($channelId)
    {
        $this->channel = $channelId;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->channel;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'groups.info';
    }
}
