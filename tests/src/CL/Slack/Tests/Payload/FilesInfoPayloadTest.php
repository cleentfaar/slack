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

use CL\Slack\Payload\FilesInfoPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesInfoPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new FilesInfoPayload();
        $payload->setFileId('F1234567');
        $payload->setPage(1);
        $payload->setCount(10);

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param FilesInfoPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'file' => $payload->getFileId(),
            'page' => $payload->getPage(),
            'count' => $payload->getCount(),
        ];
    }
}
