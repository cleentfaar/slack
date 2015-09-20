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

use CL\Slack\Payload\OauthAccessPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class OauthAccessPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'access_token' => 'xoxt-23984754863-2348975623103',
            'scope' => 'read',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                      $responseData
     * @param OauthAccessPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($responseData['access_token'], $payloadResponse->getAccessToken());
        $this->assertEquals($responseData['scope'], $payloadResponse->getScope());
    }
}
