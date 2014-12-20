<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchResultModel extends AbstractModel
{
    /**
     * @var Paging
     *
     * @Serializer\Type("CL\Slack\Model\Paging")
     */
    private $pagination;

    /**
     * @var Paging
     *
     * @Serializer\Type("CL\Slack\Model\Paging")
     */
    private $paging;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $total;

    /**
     * @return Paging
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @return Paging
     */
    public function getPaging()
    {
        return $this->paging;
    }

    /**
     * @return int Total number of results
     */
    public function getTotal()
    {
        return $this->total;
    }
}
