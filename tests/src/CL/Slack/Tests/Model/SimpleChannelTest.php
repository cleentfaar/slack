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
use CL\Slack\Model\SimpleChannel;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SimpleChannelTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return [
            'id' => 'C1234567',
            'name' => 'channel_name',
            'created' => '12345678',
            'creator' => 'U1234567',
            'is_archived' => false,
            'is_general' => false,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\SimpleChannel';
    }

    /**
     * {@inheritdoc}
     *
     * @param SimpleChannel $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertEquals($expectedData['id'], $actualModel->getId());
        $this->assertEquals($expectedData['name'], $actualModel->getName());
        $this->assertEquals($expectedData['created'], $actualModel->getCreated()->format('U'));
        $this->assertEquals($expectedData['creator'], $actualModel->getCreator());
        $this->assertEquals($expectedData['is_archived'], $actualModel->isArchived());
        $this->assertEquals($expectedData['is_general'], $actualModel->isGeneral());
    }
}
