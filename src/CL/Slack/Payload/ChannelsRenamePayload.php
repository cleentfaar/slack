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
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see    Official documentation at https://api.slack.com/methods/channels.rename
 */
class ChannelsRenamePayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $channel ID of the channel to rename
     */
    public function setChannelId($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string ID of the channel to rename
     */
    public function getChannelId()
    {
        return $this->channel;
    }

    /**
     * @param string $name New name for channel.
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string New name for channel.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'channels.rename';
    }
}
