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
 *
 * @link Official documentation at https://api.slack.com/methods/files.upload
 */
class FilesUploadPayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var string|null
     */
    private $fileType;

    /**
     * @var string|null
     */
    private $filename;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var array
     */
    private $channels = [];

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
     * @param array $channels
     */
    public function setChannels(array $channels)
    {
        $this->channels = $channels;
    }

    /**
     * @param string $channel
     */
    public function addChannel($channel)
    {
        $this->channels[] = $channel;
    }

    /**
     * @return array
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
     * @param string $channels
     */
    public function setChannelsFromString($channels)
    {
        $this->channels = explode(',', $channels);
    }

    /**
     * @return string
     */
    public function getChannelsAsString()
    {
        return implode(',', $this->channels);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'files.upload';
    }
}
