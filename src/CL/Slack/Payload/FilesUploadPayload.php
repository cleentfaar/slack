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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/files.upload
 */
class FilesUploadPayload extends AbstractPayload
{
    /**
     * @var string
     *
     * @Assert\NotBlank
     */
    private $content;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $fileType;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $filename;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $channels;

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string|null $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return string|null
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param string|null $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return string|null
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string|null $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @return string|null
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param string|null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'files.upload';
    }
}
