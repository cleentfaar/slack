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

use CL\Slack\Payload\RtmStartPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Travis Raup <info@travisraup.com>
 */
class RtmStartPayloadTest extends AbstractPayloadTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new RtmStartPayload();

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param RtmStartPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [];
    }
}
