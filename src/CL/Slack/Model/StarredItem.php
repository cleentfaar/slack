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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class StarredItem extends AbstractModel
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var File
     */
    private $file;

    /**
     * @var string
     */
    private $comment;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
