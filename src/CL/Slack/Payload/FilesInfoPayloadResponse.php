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

use CL\Slack\Model\File;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesInfoPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var File|null
     */
    private $file;

    /**
     * @return File|null
     */
    public function getFile()
    {
        return $this->file;
    }
}
