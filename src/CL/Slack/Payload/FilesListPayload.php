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
 * @link Official documentation at https://api.slack.com/methods/files.list
 */
class FilesListPayload extends AbstractPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $user;

    /**
     * @var string
     *
     * @Serializer\Type("DateTime<'U'>")
     */
    private $tsFrom;

    /**
     * @var string
     *
     * @Serializer\Type("DateTime<'U'>")
     */
    private $tsTo;

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
    private $page;

    /**
     * @var array
     *
     * @Serializer\Type("string")
     * @Serializer\Accessor(setter="setImplodedTypes", getter="getImplodedTypes")
     */
    private $types = ['all'];

    /**
     * Filter files created by a single user.
     *
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->user = $userId;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * Filter files created after this timestamp (inclusive).
     *
     * @param \DateTime|null $timestampFrom
     */
    public function setTimestampFrom(\DateTime $timestampFrom = null)
    {
        $this->tsFrom = $timestampFrom;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestampFrom()
    {
        return $this->tsFrom;
    }

    /**
     * Filter files created before this timestamp (inclusive).
     *
     * @param \DateTime|null $timestampTo
     */
    public function setTimestampTo(\DateTime $timestampTo = null)
    {
        $this->tsTo = $timestampTo;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestampTo()
    {
        return $this->tsTo;
    }

    /**
     * @param int $count Number of items to return per page.
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return int|null Number of items to return per page.
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $page Page number of results to return.
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int|null Page number of results to return.
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Filter files by type:
     *
     * all - All files
     * posts - Posts
     * snippets - Snippets
     * images - Image files
     * gdocs - Google docs
     * zips - Zip files
     * pdfs - PDF files
     *
     * The default value is all, which does not filter the list.
     *
     * @param array $types
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param string $types
     */
    public function setImplodedTypes($types)
    {
        $this->types = explode(',', $types);
    }

    /**
     * @return string
     */
    public function getImplodedTypes()
    {
        return implode(',', $this->types);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'files.list';
    }
}
