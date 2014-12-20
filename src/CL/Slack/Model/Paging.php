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
class Paging extends AbstractModel
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $count;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $total;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $page;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $pages;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->pages;
    }
}
