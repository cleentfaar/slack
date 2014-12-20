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
            'color'    => '#123456',
            'fallback' => 'fallback text',
            'text'     => 'normal text',
            'pre_text' => 'pre text',
            'fields' => [
                [
                    'title' => 'first title',
                    'short' => true,
                    'value' => 'field1',
                ],
                [
                    'title' => 'second title',
                    'short' => false,
                    'value' => 'field2',
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

        $actualFields = $actualModel->getFields();
        $this->assertCount(count($expectedData['fields']), $actualFields);
        foreach ($expectedData['fields'] as $x => $attachmentFieldData) {
            $this->assertEquals($attachmentFieldData['title'], $actualFields[$x]->getTitle());
            $this->assertEquals($attachmentFieldData['short'], $actualFields[$x]->getShort());
            $this->assertEquals($attachmentFieldData['value'], $actualFields[$x]->getValue());
        }
    }
}
