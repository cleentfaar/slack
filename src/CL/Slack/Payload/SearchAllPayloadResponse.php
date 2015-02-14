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

use CL\Slack\Model\FileResult;
use CL\Slack\Model\MessageResult;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @var MessageResult
     */
    private $messages;

    /**
     * @var FileResult
     */
    private $files;

    /**
     * @return MessageResult
     */
    public function getMessageResult()
    {
        return $this->messages;
    }

    /**
     * @return FileResult
     */
    public function getFileResult()
    {
        return $this->files;
    }
}
