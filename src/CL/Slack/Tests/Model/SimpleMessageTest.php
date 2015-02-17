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
use CL\Slack\Model\SimpleMessage;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SimpleMessageTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return $this->createSimpleMessage();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\SimpleMessage';
    }

    /**
     * {@inheritdoc}
     *
     * @param SimpleMessage $actual
     */
    protected function assertModel(array $expected, AbstractModel $actual)
    {
        $this->assertSimpleMessage($expected, $actual);
    }
}
