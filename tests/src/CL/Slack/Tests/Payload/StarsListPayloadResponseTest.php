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

use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Payload\StarsListPayloadResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class StarsListPayloadResponseTest extends AbstractPayloadResponseTest
{
    /**
     * {@inheritdoc}
     */
    public function createResponseData()
    {
        return [
            'items' => [
                $this->createStarredItem(),
            ],
            'paging' => $this->createPaging(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array                    $responseData
     * @param StarsListPayloadResponse $payloadResponse
     */
    protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse)
    {
        foreach ($payloadResponse->getItems() as $i => $item) {
            $this->assertStarredItem($responseData['items'][$i], $item);
        }

        $this->assertPaging($responseData['paging'], $payloadResponse->getPaging());
    }
}
