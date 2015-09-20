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
 * Payload that triggers the channels.history-method; allowing you to fetch historical information about a given channel.
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/methods/im.history
 */
class ImHistoryPayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $oldest;

    /**
     * @var string
     */
    private $latest;

    /**
     * @var int
     */
    private $count;

    /**
     * @var bool
     */
    private $inclusive;

    /**
     * @param string $imId
     */
    public function setImId($imId)
    {
        $this->channel = $imId;
    }

    /**
     * @return string
     */
    public function getImId()
    {
        return $this->channel;
    }

    /**
     * @param string|string|null $latest
     */
    public function setLatest($latest = null)
    {
        $this->latest = $latest;
    }

    /**
     * @return string|string|null
     */
    public function getLatest()
    {
        return $this->latest;
    }

    /**
     * @param string|null $oldest
     */
    public function setOldest($oldest = null)
    {
        $this->oldest = $oldest;
    }

    /**
     * @return string|null
     */
    public function getOldest()
    {
        return $this->oldest;
    }

    /**
     * @param int|null $count
     */
    public function setCount($count = null)
    {
        $this->count = $count;
    }

    /**
     * @return int|null
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return bool
     */
    public function isInclusive()
    {
        return $this->inclusive;
    }

    /**
     * @param bool $inclusive
     */
    public function setInclusive($inclusive)
    {
        $this->inclusive = $inclusive;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'im.history';
    }
}
