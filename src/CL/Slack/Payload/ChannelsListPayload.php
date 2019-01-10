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
 * @link Official documentation at https://api.slack.com/methods/channels.list
 */
class ChannelsListPayload extends AbstractPayload
{
    /**
     * @var bool
     */
	private $exclude_archived;

	/**
	 * @var bool
	 */
	private $exclude_members;

	/**
	 * @var int
	 */
	private $limit;

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'channels.list';
    }

    /**
     * @param bool $exclude_archived
     */
    public function setExcludeArchived($exclude_archived)
    {
        $this->exclude_archived = $exclude_archived;
    }

    /**
     * @return bool
     */
    public function isExcludeArchived()
    {
        return $this->exclude_archived;
    }

	/**
	 * @return bool
	 */
	public function isExcludeMembers()
	{
		return $this->exclude_members;
	}

	/**
	 * @param bool $exclude_members
	 */
	public function setExcludeMembers( bool $exclude_members )
	{
		$this->exclude_members = $exclude_members;
	}

	/**
	 * @return int
	 */
	public function getLimit()
	{
		return $this->limit;
	}

	/**
	 * @param int $limit
	 */
	public function setLimit( $limit )
	{
		$this->limit = $limit;
	}

}
