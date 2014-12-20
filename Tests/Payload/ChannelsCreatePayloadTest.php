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

use CL\Slack\Payload\ChannelsCreatePayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsCreatePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsCreatePayload();
        $payload->setName('acme_channel');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsCreatePayload $payload
     * @param array                  $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
        $this->assertEquals($payload->getName(), $payloadData['name']);
    }
}
