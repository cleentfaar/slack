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
class AttachmentField extends AbstractModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $value;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     */
    private $short;

    /**
     * @param string $title The title may not contain markup and will be escaped for you
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string The title of the field (does not contain markup and is escaped)
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $value Text value of the field. May contain standard message markup and must be escaped as normal.
     *                      May be multi-line.
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string Text value of the field. May contain standard message markup and must be escaped as normal.
     *                May be multi-line.
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param bool $short Optional flag indicating whether the `value` is short enough to be
     *                    displayed side-by-side with other values
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

    /**
     * @return bool Optional flag indicating whether the `value` is short enough to be
     *              displayed side-by-side with other values
     */
    public function getShort()
    {
        return $this->short;
    }
}
