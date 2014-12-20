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
 */
class ChatPostMessagePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     */
    private $ts;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $channel;

    /**
     * @return float|null The Slack timestamp on which your message has been posted, or null if the call failed
     */
    public function getTimestamp()
    {
        return $this->ts;
    }

    /**
     * @return string|null The Slack channel on which your message has been posted, or null if the call failed
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
