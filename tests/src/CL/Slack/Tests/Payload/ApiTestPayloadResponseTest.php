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

use CL\Slack\Payload\ApiTestPayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiTestPayloadResponseTest extends AbstractPayloadResponseTestCase
{
    /**
     * @inheritdoc
     */
    public function createResponseData()
    {
        return [
            'error' => 'fake-error',
            'args' => [
                'foo' => 'bar',
            ],
        ];
    }

    /**
     * @inheritdoc
     *
     * @param array                  $responseData
     * @param ApiTestPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($responseData['args'], $payloadResponse->getArguments());
        $this->assertEquals($responseData['args']['foo'], $payloadResponse->getArgument('foo'));
        $this->assertEquals($responseData['error'], $payloadResponse->getError());
    }
}
