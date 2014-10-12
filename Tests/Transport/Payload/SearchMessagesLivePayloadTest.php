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
use CL\Slack\Transport\Payload\Response\SearchMessagesPayloadResponse;
use CL\Slack\Transport\Payload\SearchMessagesPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessagesLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return SearchMessagesPayload
     */
    public function buildPayload()
    {
        $payload = new SearchMessagesPayload();
        $payload->setQuery('Hello world!');

        return $payload;
    }

    /**
     * @param SearchMessagesPayloadResponse|PayloadResponseInterface $response
     */
    public function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\SearchMessagesPayloadResponse', $response);
        $this->assertInstanceof('\CL\Slack\Model\MessageSearchResult', $response->getMessageResult());

        foreach ($response->getMessageResult()->getMatches() as $message) {
            $this->assertInstanceOf('\CL\Slack\Model\SimpleMessage', $message, 'Messages should be instances of the correct class');
        }
    }
}
