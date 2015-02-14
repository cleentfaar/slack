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
use CL\Slack\Model\AttachmentField;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AttachmentFieldTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return [
            'title' => 'foo',
            'value' => 'bar',
            'short' => false,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\AttachmentField';
    }

    /**
     * {@inheritdoc}
     *
     * @param AttachmentField $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertEquals($expectedData['title'], $actualModel->getTitle());
        $this->assertEquals($expectedData['value'], $actualModel->getValue());
        $this->assertEquals($expectedData['short'], $actualModel->isShort());
    }
}
