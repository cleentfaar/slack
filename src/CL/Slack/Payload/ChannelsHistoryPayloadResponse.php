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

use CL\Slack\Model\SimpleMessage;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsHistoryPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     */
    private $latest;

    /**
     * @var SimpleMessage[]
     *
     * @Serializer\Type("array<CL\Slack\Model\SimpleMessage>")
     */
    private $messages;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    private $hasMore;

    /**
     * @return float|null The (Slack) timestamp on which the latest action was performed on the channel.
     */
    public function getLatest()
    {
        return $this->latest;
    }

    /**
     * @return SimpleMessage[] The (Slack) messages posted on the channel.
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @return bool Whether there are more messages that can be queried by using the 'latest' timestamp returned.
     */
    public function getHasMore()
    {
        return $this->hasMore;
    }
}
