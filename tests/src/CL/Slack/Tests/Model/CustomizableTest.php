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
use CL\Slack\Model\Customizable;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class CustomizableTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return [
            'value' => 'this is the customizable value',
            'creator' => 'U1234567',
            'last_set' => 1369677212,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\Customizable';
    }

    /**
     * {@inheritdoc}
     *
     * @param Customizable $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertEquals($expectedData['value'], $actualModel->getValue());
        $this->assertEquals($expectedData['last_set'], $actualModel->getLastSet()->format('U'));
        $this->assertEquals($expectedData['creator'], $actualModel->getCreator());
    }
}
