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

use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\UsersInfoPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersInfoPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new UsersInfoPayload();
        $payload->setUserId('U1234567');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param UsersInfoPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'user' => $payload->getUserId(),
        ];
    }
}
