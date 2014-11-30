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

use CL\Slack\Model\File;
use CL\Slack\Model\Paging;
use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FilesListPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var File[]
     *
     * @Serializer\Type("array<CL\Slack\Model\File>")
     */
    private $files = [];

    /**
     * @var Paging
     *
     * @Serializer\Type("CL\Slack\Model\Paging")
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
    protected function getOwnErrors()
    {
        return [
            'unknown_type' => 'Value passed for types was invalid',
        ];
    }
}
