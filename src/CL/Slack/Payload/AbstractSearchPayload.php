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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchPayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $sort;

    /**
     * @var string
     */
    private $sortDir;

    /**
     * @var bool
     */
    private $highlight;

    /**
     * @var int
     */
    private $count;

    /**
     * @var int
     */
    private $page;

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param bool $highlight
     */
    public function setHighlight($highlight)
    {
        $this->highlight = $highlight;
    }

    /**
     * @return bool
     */
    public function getHighlight()
    {
        return $this->highlight;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sortDir
     */
    public function setSortDir($sortDir)
    {
        $this->sortDir = $sortDir;
    }

    /**
     * @return string
     */
    public function getSortDir()
    {
        return $this->sortDir;
    }
}
