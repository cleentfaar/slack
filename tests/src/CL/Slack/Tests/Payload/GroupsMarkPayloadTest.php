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

use CL\Slack\Payload\GroupsMarkPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsMarkPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new GroupsMarkPayload();
        $payload->setGroupId('G1234567');
        $payload->setSlackTimestamp('12345678.12345678');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param GroupsMarkPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'ts' => $payload->getSlackTimestamp(),
            'channel' => $payload->getGroupId(),
        ];
    }
}
