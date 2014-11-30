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

use CL\Slack\Model\FileSearchResult;
use CL\Slack\Model\MessageSearchResult;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @var MessageSearchResult
     */
    private $messages;

    /**
     * @var FileSearchResult
     */
    private $files;

    /**
     * @return MessageSearchResult
     */
    public function getMessageSearchResult()
    {
        return $this->messages;
    }

    /**
     * @return FileSearchResult
     */
    public function getFileSearchResult()
    {
        return $this->files;
    }
}
