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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Attachment extends AbstractModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $fallback;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $preText;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $text;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $color;

    /**
     * @var AttachmentField[]
     *
     * @Serializer\Type("array<CL\Slack\Model\AttachmentField>")
     */
    private $fields = [];

    /**
     * @param string $fallback Required text summary of the attachment that is shown by clients that understand attachments
     *                         but choose not to show them.
     */
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;
    }

    /**
     * @return string Text summary of the attachment that is shown by clients that understand attachments
     *                but choose not to show them.
     */
    public function getFallback()
    {
        return $this->fallback;
    }

    /**
     * @param string|null $preText Optional text that should appear above the formatted data.
     */
    public function setPreText($preText = null)
    {
        $this->preText = $preText;
    }

    /**
     * @return string|null Optional text that should appear above the formatted data.
     */
    public function getPreText()
    {
        return $this->preText;
    }

    /**
     * @param string|null $text Optional text that should appear within the attachment.
     */
    public function setText($text = null)
    {
        $this->text = $text;
    }

    /**
     * @return string|null Optional text that should appear within the attachment.
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string|null $color Can either be one of 'good', 'warning', 'danger', or any hex color code
     */
    public function setColor($color = null)
    {
        $this->color = $color;
    }

    /**
     * @return string|null Can either be one of 'good', 'warning', 'danger', or any hex color code
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param AttachmentField[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return AttachmentField[]
     */
    public function getFields()
    {
        return $this->fields;
    }
}
