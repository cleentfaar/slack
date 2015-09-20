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
use CL\Slack\Payload\UsersListPayloadResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersListPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'members' => [
                $this->createUser(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                    $responseData
     * @param UsersListPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $users = $payloadResponse->getUsers();

        $this->assertCount(1, $users);

        foreach ($users as $x => $user) {
            $this->assertUser($responseData['members'][$x], $user);
        }
    }
}
