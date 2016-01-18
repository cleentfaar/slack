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

use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Payload\TeamInfoPayloadResponse;

/**
 * @author Nic Malan <nicmalan@gmail.com>
 */
class TeamInfoPayloadResponseTest extends AbstractPayloadResponseTestCase
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'team' => $this->createTeam(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                   $responseData
     * @param TeamInfoPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertInstanceOf('CL\Slack\Model\Team', $payloadResponse->getTeam());
        $this->assertTeam($responseData['team'], $payloadResponse->getTeam());
    }
}
