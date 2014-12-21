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
class File extends AbstractModel
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $user;

    /**
     * @var \DateTime|null
     *
     * @Serializer\Type("DateTime<'U'>")
     */
    private $timestamp;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $name;

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
    private $mimeType;

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
    private $prettyType;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $mode;

    /**
     * @var boolean|null
     *
     * @Serializer\Type("boolean")
     */
    private $editable;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $externalType;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $size;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $url;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $urlDownload;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $urlPrivate;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $urlPrivateDownload;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $thumb64;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $thumb80;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $thumb360;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $thumb360Gif;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $thumb360W;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $thumb360H;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $permalink;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $editLink;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $preview;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $previewHighlight;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     */
    private $lines;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     */
    private $linesMore;

    /**
     * @var boolean|null
     *
     * @Serializer\Type("boolean")
     */
    private $isPublic;

    /**
     * @var boolean|null
     *
     * @Serializer\Type("boolean")
     */
    private $isExternal;

    /**
     * @var boolean|null
     *
     * @Serializer\Type("boolean")
     */
    private $isStarred;

    /**
     * @var boolean|null
     *
     * @Serializer\Type("boolean")
     */
    private $publicUrlShared;

    /**
     * @var array<string>|null
     *
     * @Serializer\Type("array<string>")
     */
    private $channels;

    /**
     * @var array<string>|null
     *
     * @Serializer\Type("array<string>")
     */
    private $groups;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $initialComment;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
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
     * @return \DateTime The timestamp on which the file was posted
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
     * @return mixed
     */
    public function getPublicUrlShared()
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
