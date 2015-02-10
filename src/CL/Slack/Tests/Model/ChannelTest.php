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
use CL\Slack\Model\Channel;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return $this->createChannel();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\Channel';
    }

    /**
     * {@inheritdoc}
     *
     * @param Channel $actualModel
     */
    protected function assertModel(array $expectedData, AbstractModel $actualModel)
    {
        $this->assertChannel($expectedData, $actualModel);
    }
}
