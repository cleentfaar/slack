<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Api\Method;

use CL\Slack\Api\Method\MethodFactory;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatPostMessageMethodTest extends AbstractMethodTest
{
    /**
     * {@inheritdoc}
     */
    public function getMethodAlias()
    {
        return MethodFactory::METHOD_CHAT_POSTMESSAGE;
    }

    /**
     * @return array
     */
    public function getPossibleOptions()
    {
        return [
            [
                [
                    'token'      => 'my_token',
                    'channel'    => 'testchannel',
                    'text'       => 'This is a test',
                    'username'   => 'my_username',
                    'icon_emoji' => 'my_emoji',
                ],
                false
            ],
            [
                [
                    'channel' => 'my_channel',
                    'text'    => 'This is a test',
                ],
                true
            ],
            [
                [
                    'token'      => 'my_token',
                    'channel'    => [1,2,3],
                    'text'       => new \stdClass(),
                    'username'   => 'my_username',
                    'icon_emoji' => 'my_emoji',
                ],
                true
            ],
        ];
    }
}
