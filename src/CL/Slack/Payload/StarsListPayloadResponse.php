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

use CL\Slack\Model\File;
use CL\Slack\Model\Paging;
use CL\Slack\Model\StarredItem;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class StarsListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var StarredItem[]
     *
     * @Serializer\Type("array<CL\Slack\Model\StarredItem>")
     */
    private $items = [];

    /**
     * @var Paging
     *
     * @Serializer\Type("CL\Slack\Model\Paging")
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
