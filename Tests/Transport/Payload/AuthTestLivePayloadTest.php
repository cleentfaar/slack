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

use CL\Slack\Transport\Payload\AuthTestPayload;
use CL\Slack\Transport\Payload\Response\AuthTestPayloadResponse;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestLivePayloadTest extends AbstractLivePayloadTest
{
    /**
     * @return AuthTestPayload
     */
    protected function buildPayload()
    {
        $payload = new AuthTestPayload();

        return $payload;
    }

    /**
     * @param AuthTestPayloadResponse|PayloadResponseInterface $response
     */
    protected function assertResponse(PayloadResponseInterface $response)
    {
        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\AuthTestPayloadResponse', $response);
        $this->assertNotNull($response->getUserId());
        $this->assertNotNull($response->getUsername());
        $this->assertNotNull($response->getTeam());
        $this->assertNotNull($response->getTeamId());
        $this->assertNotNull($response->getUrl());
    }
}
