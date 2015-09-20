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

use CL\Slack\Payload\AuthTestPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'user' => 'acme_user',
            'user_id' => 'U1234567',
            'team' => 'acme_team',
            'team_id' => 'T1234567',
            'url' => 'https://acme.slack.com/user/U1234567',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                   $responseData
     * @param AuthTestPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($payloadResponse->getUserId(), $responseData['user_id']);
        $this->assertEquals($payloadResponse->getUsername(), $responseData['user']);
        $this->assertEquals($payloadResponse->getTeamId(), $responseData['team_id']);
        $this->assertEquals($payloadResponse->getTeam(), $responseData['team']);
        $this->assertEquals($payloadResponse->getUrl(), $responseData['url']);
    }
}
