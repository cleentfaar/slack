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
 * @link Official documentation at https://api.slack.com/methods/chat.delete
 */
class ChatUpdatePayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $channel;

    /**
     * @var float
     */
    private $ts;

    /**
     * @var string
     */
    private $text;

    /**
     * @param string $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channel = $channelId;
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->channel;
    }

    /**
     * @param float $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->ts = $timestamp;
    }

    /**
     * @return float
     */
    public function getTimestamp()
    {
        return $this->ts;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @deprecated Will be removed soon, use `setText()` instead
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->setText($message);
    }

    /**
     * @deprecated Will be removed soon, use `getText()` instead
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getText();
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'chat.update';
    }
}
