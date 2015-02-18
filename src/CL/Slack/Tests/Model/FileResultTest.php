<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Model;

use CL\Slack\Model\AbstractModel;
use CL\Slack\Model\FileResult;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class FileResultTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return [
            'matches' => [
                $this->createFileResultItem(),
            ],
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\FileResult';
    }

    /**
     * {@inheritdoc}
     *
     * @param FileResult $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        foreach ($actualModel->getMatches() as $i => $fileResultItem) {
            $this->assertFileResultItem($expectedData['matches'][$i], $fileResultItem);
        }
    }
}
