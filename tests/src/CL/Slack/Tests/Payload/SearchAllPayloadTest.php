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
use CL\Slack\Payload\SearchAllPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllPayloadTest extends AbstractSearchPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new SearchAllPayload();

        return parent::createPayload($payload);
    }

    /**
     * {@inheritdoc}
     *
     * @param SearchAllPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return parent::getExpectedPayloadData($payload);
    }
}
