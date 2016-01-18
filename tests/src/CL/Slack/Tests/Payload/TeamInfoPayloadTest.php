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
use CL\Slack\Payload\TeamInfoPayload;

/**
 * @author Nic Malan <nicmalan@gmail.com>
 */
class TeamInfoPayloadTest extends AbstractPayloadTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new TeamInfoPayload();
        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param TeamInfoPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [];
    }
}
