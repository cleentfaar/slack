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

use CL\Slack\Payload\FilesUploadPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesUploadPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new FilesUploadPayload();
        $payload->setContent('fake content');
        $payload->setFilename('acme_file.txt');
        $payload->setFileType('text/plain');
        $payload->setTitle('Acme File');
        $payload->setChannels(['C1234567']);

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param FilesUploadPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'title' => $payload->getTitle(),
            'content' => $payload->getContent(),
            'filename' => $payload->getFilename(),
            'file_type' => $payload->getFileType(),
            'channels' => $payload->getChannelsAsString(),
        ];
    }
}
