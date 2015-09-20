<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Payload;

use CL\Slack\Model\Attachment;
use CL\Slack\Model\AttachmentField;
use CL\Slack\Payload\ChatPostMessagePayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatPostMessagePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChatPostMessagePayload();
        $payload->setChannel('#acme_channel');
        $payload->setUsername('acme_user');
        $payload->setText('Hello World!');
        $payload->setIconEmoji(':truck:');
        $payload->setLinkNames(true);
        $payload->setParse('full');
        $payload->setUnfurlLinks(true);
        $payload->setUnfurlMedia(false);
        $payload->setIconUrl('http://foo.bar/emoji-1.png');

        $fakeAttachmentField = new AttachmentField();
        $fakeAttachmentField->setShort(false);
        $fakeAttachmentField->setTitle('the title');
        $fakeAttachmentField->setValue('the value');

        $fakeAttachment = new Attachment();
        $fakeAttachment->setTitle('the title');
        $fakeAttachment->setTitleLink('http://thetitlelink.com');
        $fakeAttachment->setColor('the color');
        $fakeAttachment->setFallback('the fallback');
        $fakeAttachment->setImageUrl('the image url');
        $fakeAttachment->setPreText('this is...');
        $fakeAttachment->setText('my attachment');
        $fakeAttachment->setAuthorIcon(':skull:');
        $fakeAttachment->setAuthorName('the author');
        $fakeAttachment->setAuthorLink('http://theauthor.com');
        $fakeAttachment->addField($fakeAttachmentField);

        $payload->addAttachment($fakeAttachment);

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChatPostMessagePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        /** @var Attachment $attachment */
        $attachment = $payload->getAttachments()->first();

        /** @var AttachmentField $attachmentField */
        $attachmentField = $attachment->getFields()->first();

        return [
            'channel' => $payload->getChannel(),
            'text' => $payload->getText(),
            'username' => $payload->getUsername(),
            'icon_emoji' => $payload->getIconEmoji(),
            'icon_url' => $payload->getIconUrl(),
            'unfurl_media' => $payload->getUnfurlMedia(),
            'unfurl_links' => $payload->getUnfurlLinks(),
            'link_names' => $payload->getLinkNames(),
            'parse' => $payload->getParse(),
            'attachments' => json_encode([
                [
                    'title' => $attachment->getTitle(),
                    'title_link' => $attachment->getTitleLink(),
                    'image_url' => $attachment->getImageUrl(),
                    'author_name' => $attachment->getAuthorName(),
                    'author_link' => $attachment->getAuthorLink(),
                    'author_icon' => $attachment->getAuthorIcon(),
                    'pre_text' => $attachment->getPreText(),
                    'text' => $attachment->getText(),
                    'color' => $attachment->getColor(),
                    'fallback' => $attachment->getFallback(),
                    'fields' => [
                        [
                            'title' => $attachmentField->getTitle(),
                            'value' => $attachmentField->getValue(),
                            'short' => $attachmentField->isShort(),
                        ],
                    ],
                ],
            ]),
        ];
    }
}
