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

use CL\Slack\Payload\ApiTestPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiTestPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new ApiTestPayload();
        $payload->setError('fake-error');
        $payload->addArgument('foo', 'bar');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param ApiTestPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'error' => $payload->getError(),
            'foo' => $payload->getArgument('foo'),
        ];
    }
}
