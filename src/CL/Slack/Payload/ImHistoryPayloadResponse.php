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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ImHistoryPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string|null
     */
    private $latest;

    /**
     * @var SimpleMessage[]
     */
    private $messages;

    /**
     * @var bool
     */
    private $hasMore;

    /**
     * @return string|null The (Slack) timestamp on which the latest action was performed on the channel.
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
