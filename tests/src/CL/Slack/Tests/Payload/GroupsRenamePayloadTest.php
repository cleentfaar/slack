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

use CL\Slack\Payload\GroupsRenamePayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupsRenamePayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new GroupsRenamePayload();
        $payload->setGroupId('G1234567');
        $payload->setName('new_name');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param GroupsRenamePayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'channel' => $payload->getGroupId(),
            'name' => $payload->getName(),
        ];
    }
}
