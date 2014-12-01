<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AbstractSearchResultModel extends AbstractModel
{
    /**
     * @var SearchMessage[]|SearchFile[]
     */
    private $matches;

    /**
     * @var Paging
     */
    private $pagination;

    /**
     * @var Paging
     */
    private $paging;

    /**
     * @var int
     */
    private $total;

    /**
     * @return SearchMessage[]|SearchFile[]
     */
    public function getMatches()
    {
        return $this->matches;
    }

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
