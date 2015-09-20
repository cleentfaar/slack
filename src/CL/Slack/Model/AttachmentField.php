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
 *
 * @link Official documentation at https://api.slack.com/docs/attachments
 */
class AttachmentField extends AbstractModel
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $short;

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param bool $short
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

    /**
     * @return bool
     */
    public function isShort()
    {
        return $this->short;
    }
}
