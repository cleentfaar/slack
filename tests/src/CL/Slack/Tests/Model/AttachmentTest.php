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
use CL\Slack\Model\Attachment;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AttachmentTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return [
            'color' => '#123456',
            'fallback' => 'fallback text',
            'text' => 'normal text',
            'pre_text' => 'pre text',
            'fields' => [
                [
                    'title' => 'foo',
                    'value' => 'bar',
                    'short' => false,
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\Attachment';
    }

    /**
     * {@inheritdoc}
     *
     * @param Attachment $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertEquals($expectedData['color'], $actualModel->getColor());
        $this->assertEquals($expectedData['fallback'], $actualModel->getFallback());
        $this->assertEquals($expectedData['pre_text'], $actualModel->getPreText());
        $this->assertEquals($expectedData['text'], $actualModel->getText());
        $this->assertEquals($expectedData['fields'][0]['title'], $actualModel->getFields()->first()->getTitle());
        $this->assertEquals($expectedData['fields'][0]['value'], $actualModel->getFields()->first()->getValue());
        $this->assertEquals($expectedData['fields'][0]['short'], $actualModel->getFields()->first()->isShort());
    }
}
