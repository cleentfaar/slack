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
 *
 * @link Official documentation at https://api.slack.com/methods/files.upload
 */
class FilesUploadPayloadResponse extends AbstractPayloadResponse
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
