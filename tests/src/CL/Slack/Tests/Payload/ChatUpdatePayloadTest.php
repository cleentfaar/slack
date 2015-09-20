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

use CL\Slack\Payload\ChatUpdatePayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatUpdatePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ChatUpdatePayload();
        $payload->setChannelId('C1234567');
        $payload->setSlackTimestamp('12345678.12345678');
        $payload->setText('new_message');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ChatUpdatePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'channel' => $payload->getChannelId(),
            'ts' => $payload->getSlackTimestamp(),
            'text' => $payload->getText(),
        ];
    }
}
