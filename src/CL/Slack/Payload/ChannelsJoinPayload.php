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
 * @link Official documentation at https://api.slack.com/methods/channels.join
 */
class ChannelsJoinPayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $channel
     */
    public function setName($channel)
    {
        $this->name = $channel;
    }

    /**
     * @return string
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
        return 'channels.join';
    }
}
