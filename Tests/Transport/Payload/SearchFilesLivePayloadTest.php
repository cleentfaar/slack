<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport\Payload;

use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;
use CL\Slack\Transport\Payload\Response\SearchFilesPayloadResponse;
use CL\Slack\Transport\Payload\SearchFilesPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFilesLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return SearchFilesPayload
     */
    public function buildPayload()
    {
        $payload = new SearchFilesPayload();
        $payload->setQuery('Hello world!');

        return $payload;
    }

    /**
     * @param SearchFilesPayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\SearchFilesPayloadResponse', $response);
        $this->assertInstanceof('\CL\Slack\Model\FileSearchResult', $response->getFileResult());

        foreach ($response->getFileResult()->getMatches() as $file) {
            $this->assertInstanceOf('\CL\Slack\Model\File', $file, 'Files should be instances of the correct class');
            $this->assertNotNull($file->getUserId());
        }
    }
}
