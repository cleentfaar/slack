<?php

/*
 * This file is part of the CLSlackBundle.
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
 * @see Official documentation at https://api.slack.com/methods/stars.list
 */
class StarsListPayload extends AbstractPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $user;

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
     * Show stars by this user. Defaults to the authenticated user.
     *
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->user = $userId;
    }

    /**
     * Show stars by this user. Defaults to the authenticated user.
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user;
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
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'stars.list';
    }
}
