<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/chat.postMessage
 */
class ChatPostMessagePayload extends AbstractPayload
{
    /**
     * @param string $channel The channel to send the message to. Can be a public channel, private group, IM channel, encoded ID, or a name.
     */
    public function setChannel($channel)
    {
        $this->options['channel'] = $channel;
    }

    /**
     * @return string The channel to send the message to.
     */
    public function getChannel()
    {
        return isset($this->options['channel']) ? $this->options['channel'] : null;
    }

    /**
     * @param string $message Actual message to send.
     *
     * @see https://api.slack.com/docs/formatting for an explanation of formatting.
     */
    public function setMessage($message)
    {
        $this->options['text'] = $message;
    }

    /**
     * @return string Actual message to send.
     */
    public function getMessage()
    {
        return isset($this->options['text']) ? $this->options['text'] : null;
    }

    /**
     * @param string $username Name of bot that will send the message (can be any name you want).
     */
    public function setUsername($username)
    {
        $this->options['text'] = $username;
    }

    /**
     * @return string Name of the bot that will send the message.
     */
    public function getUsername()
    {
        return isset($this->options['username']) ? $this->options['username'] : null;
    }

    /**
     * Sets the emoji to use as the icon for this message (overrides icon URL).
     *
     * You can use one of Slack's emoji's or upload your own.
     *
     * @see https://{YOURSLACKTEAMHERE}.slack.com/customize/emoji
     *
     * @param string|null $iconEmoji Emoji to use as the icon for this message (overrides icon URL).
     */
    public function setIconEmoji($iconEmoji = null)
    {
        $this->options['icon_emoji'] = $iconEmoji;
    }

    /**
     * @return string|null Emoji to use as the icon for this message.
     */
    public function getIconEmoji()
    {
        return isset($this->options['icon_emoji']) ? $this->options['icon_emoji'] : null;
    }

    /**
     * @param string|null $iconUrl URL to an image to use as the icon for this message.
     */
    public function setIconUrl($iconUrl = null)
    {
        $this->options['icon_url'] = $iconUrl;
    }

    /**
     * @return string|null URL to an image to use as the icon for this message.
     */
    public function getIconUrl()
    {
        return isset($this->options['icon_url']) ? $this->options['icon_url'] : null;
    }

    /**
     * By default links to media are unfurled, but links to text content are not.
     * For more information on the differences and how to control this, see the the unfurling documentation.
     *
     * @see https://api.slack.com/docs/unfurling
     *
     * @param bool $unfurlLinks Pass true to enable unfurling of primarily text-based content.
     */
    public function setUnfurlLinks($unfurlLinks)
    {
        $this->options['unfurl_links'] = $unfurlLinks;
    }

    /**
     * @return bool|null
     */
    public function getUnfurlLinks()
    {
        return isset($this->options['unfurl_links']) ? $this->options['unfurl_links'] : null;
    }

    /**
     * @see https://api.slack.com/docs/unfurling
     *
     * @param bool $unfurlMedia Pass false to disable unfurling of media content.
     */
    public function setUnfurlMedia($unfurlMedia)
    {
        $this->options['unfurl_media'] = $unfurlMedia;
    }

    /**
     * @return bool|null
     */
    public function getUnfurlMedia()
    {
        return isset($this->options['unfurl_media']) ? $this->options['unfurl_media'] : null;
    }

    /**
     * @see https://api.slack.com/docs/unfurling
     *
     * @param bool $linkNames Pass false to disable unfurling of media content.
     */
    public function setLinkNames($linkNames)
    {
        $this->options['link_names'] = $linkNames;
    }

    /**
     * @see https://api.slack.com/docs/unfurling
     *
     * @return bool|null
     */
    public function getLinkNames()
    {
        return isset($this->options['link_names']) ? $this->options['link_names'] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'chat.postMessage';
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return '\CL\Slack\Transport\Payload\Response\ChatPostMessagePayloadResponse';
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequired()
    {
        return [
            'channel',
            'text',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptional()
    {
        return [
            'username',
            'parse',
            'link_names',
            'attachments',
            'unfurl_links',
            'unfurl_media',
            'icon_url',
            'icon_emoji',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getAllowedTypes()
    {
        return [
            'text'         => ['string'],
            'channel'      => ['string'],
            'username'     => ['string', 'null'],
            'icon_url'     => ['string', 'null'],
            'icon_emoji'   => ['string', 'null'],
            'link_names'   => ['boolean', 'null'],
            'unfurl_links' => ['boolean', 'null'],
            'unfurl_media' => ['boolean', 'null'],
            'attachments'  => ['array<\CL\Slack\Model\Attachment>', 'null'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getAllowedValues()
    {
        return [
            'parse' => [
                'none',
                'full',
            ],
        ];
    }
}
