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
use CL\Slack\Model\GroupWithState;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class GroupWithStateTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return $this->createGroupWithState();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\GroupWithState';
    }

    /**
     * {@inheritdoc}
     *
     * @param GroupWithState $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertGroupWithState($expectedData, $actualModel);
    }
}
