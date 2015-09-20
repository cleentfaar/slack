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

use CL\Slack\Payload\ImClosePayloadResponse;
use CL\Slack\Payload\PayloadResponseInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ImClosePayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'no_op' => true,
            'already_closed' => true,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                  $responseData
     * @param ImClosePayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        $this->assertEquals($responseData['no_op'], $payloadResponse->isNoOp());
        $this->assertEquals($responseData['already_closed'], $payloadResponse->isAlreadyClosed());
    }
}
