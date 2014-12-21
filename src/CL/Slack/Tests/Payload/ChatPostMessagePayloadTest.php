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
        $payload->setChannel('acme_channel');
        $payload->setUsername('acme_user');
        $payload->setMessage('Hello World!');
        $payload->setIconEmoji(':truck:');
        $payload->setLinkNames(true);
        $payload->setParse('full');
        $payload->setUnfurlLinks(true);
        $payload->setUnfurlMedia(false);
        $payload->setIconUrl('http://foo.bar/emoji-1.png');

        $fakeAttachment = new Attachment();
        $fakeAttachment->setText('my attachment');
        $fakeAttachment->setField('foo', 'bar');

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
        return [
            'channel'      => $payload->getChannel(),
            'text'         => $payload->getMessage(),
            'username'     => $payload->getUsername(),
            'icon_emoji'   => $payload->getIconEmoji(),
            'icon_url'     => $payload->getIconUrl(),
            'unfurl_media' => $payload->getUnfurlMedia(),
            'unfurl_links' => $payload->getUnfurlLinks(),
            'link_names'   => $payload->getLinkNames() ? '1' : '0',
            'parse'        => $payload->getParse(),
            'attachments'  => [
                [
                    'text'   => $payload->getAttachments()->first()->getText(),
                    'fields' => $payload->getAttachments()->first()->getFields()
                ],
            ],
        ];
    }
}
