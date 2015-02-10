<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use CL\Slack\Model\Paging;
use CL\Slack\Model\StarredItem;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class StarsListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var StarredItem[]
     */
    private $items = [];

    /**
     * @var Paging
     */
    private $paging;

    /**
     * @return StarredItem[]|null
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return Paging|null
     */
    public function getPaging()
    {
        return $this->paging;
    }
}
