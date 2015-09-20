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

use CL\Slack\Model\Attachment;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/methods/chat.postMessage
 */
class ChatPostMessagePayload extends AbstractPayload implements AdvancedSerializeInterface
{
    /**
     * @var string
     */
    private $channel;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $iconEmoji;

    /**
     * @var string
     */
    private $iconUrl;

    /**
     * @var bool
     */
    private $unfurlLinks;

    /**
     * @var bool
     */
    private $unfurlMedia;

    /**
     * @var bool
     */
    private $linkNames;

    /**
     * @var string
     */
    private $parse;

    /**
     * @var Attachment[]|ArrayCollection
     */
    private $attachments;

    /**
     * @var string
     */
    private $attachmentsJson;

    public function __construct()
    {
        $this->attachments = new ArrayCollection();
    }

    /**
     * Sets the channel to send the message to.
     * Can be a public channel, private group, IM channel, encoded ID, or a name.
     *
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string The channel to send the message to.
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $text Actual message to send.
     *
     * @see https://api.slack.com/docs/formatting for an explanation of formatting.
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string Actual message to send.
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $message
     *
     * @deprecated Will be removed soon, use `setText()` instead
     */
    public function setMessage($message)
    {
        $this->setText($message);
    }

    /**
     * @return string
     *
     * @deprecated Will be removed soon, use `getText()` instead
     */
    public function getMessage()
    {
        return $this->getText();
    }

    /**
     * @param string $username Name of bot that will send the message (can be any name you want).
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string Name of the bot that will send the message.
     */
    public function getUsername()
    {
        return $this->username;
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
     * Sets the emoji to use as the icon for this message (overrides icon URL).
     *
     * You can use one of Slack's emoji's or upload your own.
     *
     * @see https://{YOURSLACKTEAMHERE}.slack.com/customize/emoji
     *
     * @param string|null $iconEmoji Emoji to use as the icon for this message (overrides icon URL).
     */
    public function setIconEmoji($iconEmoji)
    {
        if (substr($iconEmoji, 0, 1) !== ':') {
            $iconEmoji = sprintf(':%s:', $iconEmoji);
        }

        $this->iconEmoji = $iconEmoji;
    }

    /**
     * @return string|null Emoji to use as the icon for this message.
     */
    public function getIconEmoji()
    {
        return $this->iconEmoji;
    }

    /**
     * @param string|null $iconUrl URL to an image to use as the icon for this message.
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
    }

    /**
     * @return string|null URL to an image to use as the icon for this message.
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
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
        $this->unfurlLinks = $unfurlLinks;
    }

    /**
     * @return bool|null
     */
    public function getUnfurlLinks()
    {
        return $this->unfurlLinks;
    }

    /**
     * @see https://api.slack.com/docs/unfurling
     *
     * @param bool $unfurlMedia Pass false to disable unfurling of media content.
     */
    public function setUnfurlMedia($unfurlMedia)
    {
        $this->unfurlMedia = $unfurlMedia;
    }

    /**
     * @return bool|null
     */
    public function getUnfurlMedia()
    {
        return $this->unfurlMedia;
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
     * @return Attachment[]|ArrayCollection
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param Attachment $attachment
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments->add($attachment);
    }

    /**
     * Use for serialization.
     *
     * @return string
     */
    public function getAttachmentsJson()
    {
        return $this->attachmentsJson;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'chat.postMessage';
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSerialize(Serializer $serializer)
    {
        $this->attachmentsJson = $serializer->serialize($this->attachments, 'json');
    }
}
