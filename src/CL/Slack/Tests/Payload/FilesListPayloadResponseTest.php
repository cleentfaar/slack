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

use CL\Slack\Payload\FilesListPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesListPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'files' => [
                $this->createFile(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                    $responseData
     * @param FilesListPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $files = $payloadResponse->getFiles();

        $this->assertCount(1, $files);

        foreach ($files as $x => $file) {
            $this->assertFile($responseData['files'][$x], $file);
        }
    }
}
