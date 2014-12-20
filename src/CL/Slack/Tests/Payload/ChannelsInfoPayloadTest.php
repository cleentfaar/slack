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

use CL\Slack\Payload\ChannelsInfoPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInfoPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChannelsInfoPayload();
        $payload->setChannelId('C01234567');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChannelsInfoPayload $payload
     * @param array               $payloadData
     */
    protected function assertPayload(PayloadInterface $payload, array $payloadData)
    {
        $this->assertEquals($payload->getChannelId(), $payloadData['channel']);
    }
}
