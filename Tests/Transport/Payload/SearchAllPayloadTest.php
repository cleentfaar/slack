<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport\Payload;

use CL\Slack\Transport\Payload\AuthTestPayload;
use CL\Slack\Transport\Payload\SearchAllPayload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllPayloadTest extends AbstractPayloadTest
{
    /**
     * @return AuthTestPayload
     */
    public function buildPayload()
    {
        $payload = new SearchAllPayload();
        $payload->setQuery('Hello world!');

        return $payload;
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedPayloadData()
    {
        return [
            'query' => 'Hello world!',
        ];
    }
}
