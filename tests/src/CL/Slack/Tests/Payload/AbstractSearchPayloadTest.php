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

use CL\Slack\Payload\AbstractSearchPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload(AbstractSearchPayload $payload = null)
    {
        $payload->setQuery('foo');
        $payload->setPage(123);
        $payload->setCount(123);
        $payload->setHighlight(true);
        $payload->setSort('bar');
        $payload->setSortDir('asc');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param AbstractSearchPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'query' => $payload->getQuery(),
            'page' => $payload->getPage(),
            'count' => $payload->getCount(),
            'highlight' => $payload->getHighlight(),
            'sort' => $payload->getSort(),
            'sort_dir' => $payload->getSortDir(),
        ];
    }
}
