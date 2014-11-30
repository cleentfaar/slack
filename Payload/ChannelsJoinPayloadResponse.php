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

use CL\Slack\Model\Channel;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsJoinPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    private $alreadyInChannel;

    /**
     * @var Channel|null
     *
     * @Serializer\Type("CL\Slack\Model\Channel")
     */
    private $channel;

    /**
     * @return boolean
     */
    public function isAlreadyInChannel()
    {
        return $this->alreadyInChannel;
    }

    /**
     * @return Channel|null
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
