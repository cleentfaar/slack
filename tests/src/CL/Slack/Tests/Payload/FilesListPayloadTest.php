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

use CL\Slack\Payload\FilesListPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesListPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new FilesListPayload();
        $payload->setPage(1);
        $payload->setCount(10);
        $payload->setTypes(['all']);
        $payload->setUserId('U1234567');
        $payload->setTimestampFrom(new \DateTime('-1 day'));
        $payload->setTimestampTo(new \DateTime());

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param FilesListPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'page' => $payload->getPage(),
            'count' => $payload->getCount(),
            'types' => $payload->getTypes(),
            'user' => $payload->getUserId(),
            'ts_from' => $payload->getTimestampFrom()->format('U'),
            'ts_to' => $payload->getTimestampTo()->format('U'),
        ];
    }
}
