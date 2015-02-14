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

use CL\Slack\Payload\ChatDeletePayload;
use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\UsersSetActivePayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersSetActivePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new UsersSetActivePayload();

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChatDeletePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [];
    }
}
