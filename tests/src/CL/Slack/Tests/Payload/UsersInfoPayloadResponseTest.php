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
use CL\Slack\Payload\UsersInfoPayloadResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersInfoPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'user' => $this->createUser(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                    $responseData
     * @param UsersInfoPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertUser($responseData['user'], $payloadResponse->getUser());
    }
}
