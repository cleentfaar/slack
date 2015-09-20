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
     * @var string
     */
    private $ts;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $parse;

    /**
     * @var bool
     */
    private $linkNames;

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
     * @param string $timestamp
     */
    public function setSlackTimestamp($timestamp)
    {
        $this->ts = $timestamp;
    }

    /**
     * @return string
     */
    public function getSlackTimestamp()
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
     * @param string $parse Change how messages are treated.
     *
     * @see https://api.slack.com/docs/formatting
     */
    public function setParse($parse)
    {
        $this->parse = $parse;
    }

    /**
     * @return string Change how messages are treated.
     */
    public function getParse()
    {
        return $this->parse;
    }

    /**
     * @param bool $linkNames Set to true to automatically find and link channel names and usernames in the message.
     */
    public function setLinkNames($linkNames)
    {
        $this->linkNames = $linkNames;
    }

    /**
     * @see https://api.slack.com/docs/unfurling
     *
     * @return bool|null Whether channel names and usernames in the message should be linked automatically.
     */
    public function getLinkNames()
    {
        return $this->linkNames;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'chat.update';
    }
}
