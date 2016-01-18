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
use CL\Slack\Payload\UsersAdminInvitePayload;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class UsersAdminInvitePayloadTest extends AbstractPayloadTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new UsersAdminInvitePayload();
        $payload->setEmail('test@domain.org');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param UsersAdminInvitePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'email' => $payload->getEmail(),
        ];
    }
}
