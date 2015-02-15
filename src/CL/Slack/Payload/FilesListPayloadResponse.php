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
use CL\Slack\Model\Paging;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var File[]
     */
    private $files = [];

    /**
     * @var Paging
     */
    private $paging;

    /**
     * @return File[]|null
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @return Paging|null
     */
    public function getPaging()
    {
        return $this->paging;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPossibleErrors()
    {
        return array_merge(parent::getPossibleErrors(), [
            'unknown_type' => 'Value passed for types was invalid',
        ]);
    }
}
