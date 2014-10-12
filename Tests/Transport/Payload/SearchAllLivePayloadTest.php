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
use CL\Slack\Transport\Payload\Response\SearchAllPayloadResponse;
use CL\Slack\Transport\Payload\SearchAllPayload;
use CL\Slack\Transport\Payload\UsersListPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return UsersListPayload
     */
    public function buildPayload()
    {
        $payload = new SearchAllPayload();
        $payload->setQuery('Hello world!');

        return $payload;
    }

    /**
     * @param SearchAllPayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\SearchAllPayloadResponse', $response);
        $this->assertInstanceof('\CL\Slack\Model\MessageSearchResult', $response->getMessageResult());
        $this->assertInstanceof('\CL\Slack\Model\FileSearchResult', $response->getFileResult());

        foreach ($response->getMessageResult()->getMatches() as $message) {
            $this->assertInstanceOf('\CL\Slack\Model\SimpleMessage', $message, 'Messages should be instances of the correct class');
        }

        foreach ($response->getFileResult()->getMatches() as $file) {
            $this->assertInstanceOf('\CL\Slack\Model\File', $file, 'Files should be instances of the correct class');
            $this->assertNotNull($file->getUserId());
        }
    }
}
