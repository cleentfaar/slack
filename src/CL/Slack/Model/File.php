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
 * @link Official documentation at https://api.slack.com/types/file
 */
class File extends AbstractModel
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var \DateTime|null
     */
    private $created;

    /**
     * @var \DateTime|null
     */
    private $timestamp;

    /**
     * @var string|null
     */
    private $user;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $mimeType;

    /**
     * @var string|null
     */
    private $fileType;

    /**
     * @var string|null
     */
    private $prettyType;

    /**
     * @var string|null
     */
    private $mode;

    /**
     * @var bool|null
     */
    private $editable;

    /**
     * @var string|null
     */
    private $externalType;

    /**
     * @var string|null
     */
    private $size;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $urlDownload;

    /**
     * @var string|null
     */
    private $urlPrivate;

    /**
     * @var string|null
     */
    private $urlPrivateDownload;

    /**
     * @var string|null
     */
    private $thumb64;

    /**
     * @var string|null
     */
    private $thumb80;

    /**
     * @var string|null
     */
    private $thumb360;

    /**
     * @var string|null
     */
    private $thumb360Gif;

    /**
     * @var string|null
     */
    private $thumb360W;

    /**
     * @var string|null
     */
    private $thumb360H;

    /**
     * @var string|null
     */
    private $permalink;

    /**
     * @var string|null
     */
    private $editLink;

    /**
     * @var string|null
     */
    private $preview;

    /**
     * @var string|null
     */
    private $previewHighlight;

    /**
     * @var int|null
     */
    private $lines;

    /**
     * @var int|null
     */
    private $linesMore;

    /**
     * @var bool|null
     */
    private $isPublic;

    /**
     * @var bool|null
     */
    private $isExternal;

    /**
     * @var bool|null
     */
    private $isStarred;

    /**
     * @var bool|null
     */
    private $publicUrlShared;

    /**
     * @var array<string>|null
     */
    private $channels;

    /**
     * @var array<string>|null
     */
    private $groups;

    /**
     * @var string|null
     */
    private $initialComment;

    /**
     * @var int
     */
    private $numStars;

    /**
     * @return string The ID of the file
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime|null The timestamp on which the file was created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \DateTime|null The timestamp on which the file was posted
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string The name of the file.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null The title that was given to the file.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string The ID of the user that posted the file
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @return string|null
     */
    public function getEditLink()
    {
        return $this->editLink;
    }

    /**
     * @return bool|null
     */
    public function isEditable()
    {
        return $this->editable;
    }

    /**
     * @return string|null
     */
    public function getExternalType()
    {
        return $this->externalType;
    }

    /**
     * @return string|null
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return mixed
     */
    public function getInitialComment()
    {
        return $this->initialComment;
    }

    /**
     * @return bool
     */
    public function isExternal()
    {
        return $this->isExternal;
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return $this->isPublic;
    }

    /**
     * @return bool
     */
    public function isStarred()
    {
        return $this->isStarred;
    }

    /**
     * @return mixed
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * @return int|null
     */
    public function getLinesMore()
    {
        return $this->linesMore;
    }

    /**
     * @return string|null
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @return string|null
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @return int
     */
    public function getNumStars()
    {
        return $this->numStars;
    }

    /**
     * @return string|null
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @return string|null
     */
    public function getPrettyType()
    {
        return $this->prettyType;
    }

    /**
     * @return string|null
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @return mixed
     */
    public function getPreviewHighlight()
    {
        return $this->previewHighlight;
    }

    /**
     * @return bool
     */
    public function isPublicUrlShared()
    {
        return $this->publicUrlShared;
    }

    /**
     * @return string|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string|null
     */
    public function getThumb360()
    {
        return $this->thumb360;
    }

    /**
     * @return string|null
     */
    public function getThumb360Gif()
    {
        return $this->thumb360Gif;
    }

    /**
     * @return string|null
     */
    public function getThumb360H()
    {
        return $this->thumb360H;
    }

    /**
     * @return string|null
     */
    public function getThumb360W()
    {
        return $this->thumb360W;
    }

    /**
     * @return string|null
     */
    public function getThumb64()
    {
        return $this->thumb64;
    }

    /**
     * @return string|null
     */
    public function getThumb80()
    {
        return $this->thumb80;
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getUrlDownload()
    {
        return $this->urlDownload;
    }

    /**
     * @return string|null
     */
    public function getUrlPrivate()
    {
        return $this->urlPrivate;
    }

    /**
     * @return string|null
     */
    public function getUrlPrivateDownload()
    {
        return $this->urlPrivateDownload;
    }
}
