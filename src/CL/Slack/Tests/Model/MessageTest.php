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
use CL\Slack\Model\Message;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class MessageTest extends AbstractModelTest
{
    /**
     * @return array
     */
    protected function getModelData()
    {
        return $this->createMessage();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'CL\Slack\Model\Message';
    }

    /**
     * {@inheritdoc}
     *
     * @param Message $actual
     */
    protected function assertModel(array $expected, AbstractModel $actual)
    {
        $this->assertMessage($expected, $actual);
    }
}
