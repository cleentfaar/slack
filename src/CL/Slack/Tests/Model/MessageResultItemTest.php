<?php

/*
 * This message is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * message that was distributed with this source code.
 */

namespace CL\Slack\Tests\Model;

use CL\Slack\Model\AbstractModel;
use CL\Slack\Model\MessageResultItem;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class MessageResultItemTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return $this->createMessageResultItem();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\MessageResultItem';
    }

    /**
     * {@inheritdoc}
     *
     * @param MessageResultItem $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertMessageResultItem($expectedData, $actualModel);
    }
}
