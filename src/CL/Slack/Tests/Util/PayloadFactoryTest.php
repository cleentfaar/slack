<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Util;

use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Util\PayloadFactory;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadFactoryTest extends AbstractTestCase
{
    public function testChatPostMessage()
    {
        $channel   = '#acme_channel';
        $text      = 'Hello world!';
        $username  = 'acme';
        $iconEmoji = 'foobar';
        $payload   = PayloadFactory::chatPostMessage($channel, $text, $username, $iconEmoji);

        $this->assertInstanceOf('CL\Slack\Payload\ChatPostMessagePayload', $payload);
        $this->assertEquals($channel, $payload->getChannel());
        $this->assertEquals($text, $payload->getText());
        $this->assertEquals($username, $payload->getUsername());
        $this->assertEquals(':'.$iconEmoji.':', $payload->getIconEmoji());
    }
}
