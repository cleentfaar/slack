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

use CL\Slack\Payload\ImMarkPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ImMarkPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ImMarkPayload();
        $payload->setImId('I1234567');
        $payload->setSlackTimestamp('12345678.12345678');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ImMarkPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'ts' => $payload->getSlackTimestamp(),
            'channel' => $payload->getImId(),
        ];
    }
}
