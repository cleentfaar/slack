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
use CL\Slack\Payload\StarsListPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class StarsListPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new StarsListPayload();
        $payload->setCount(123);
        $payload->setPage(123);
        $payload->setUserId('U1234567');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param StarsListPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'count' => $payload->getCount(),
            'page' => $payload->getPage(),
            'user' => $payload->getUserId(),
        ];
    }
}
