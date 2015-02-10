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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFilesPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @var FileResult
     */
    private $files;

    /**
     * @return FileResult
     */
    public function getResult()
    {
        return $this->files;
    }
}
