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

/**
 * Payload that triggers the channels.create-method; used to create a channel.
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/channels.create
 */
class ChannelsCreatePayload extends AbstractPostPayload
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name Name of channel to create
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string Name of channel to create
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'channels.create';
    }
}
