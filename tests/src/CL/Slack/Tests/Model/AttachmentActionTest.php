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
use CL\Slack\Model\AttachmentAction;

/**
 * @author Samet Yilmaz <syilmaz@e-sites.nl>
 */
class AttachmentActionTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return [
            'name'  => 'foo',
            'text'  => 'bar',
            'type'  => 'fooType',
            'value' => 'barValue',
            'style' => 'fooStyle'
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\AttachmentAction';
    }

    /**
     * @inheritdoc
     *
     * @param AttachmentAction $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertEquals($expectedData['name'], $actualModel->getName());
        $this->assertEquals($expectedData['text'], $actualModel->getText());
        $this->assertEquals($expectedData['type'], $actualModel->getType());
        $this->assertEquals($expectedData['value'], $actualModel->getValue());
        $this->assertEquals($expectedData['style'], $actualModel->getStyle());
    }
}
