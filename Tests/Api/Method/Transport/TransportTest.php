<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Api\Method\Transport;

use CL\Slack\Api\Method\MethodFactory;
use CL\Slack\Api\Method\Response\ChatPostMessageResponse;
use CL\Slack\Api\Method\Transport\Transport;
use CL\Slack\Tests\AbstractTestCase;
use GuzzleHttp\Client;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class TransportTest extends AbstractTestCase
{
    /**
     * @var Transport
     */
    protected $transport;

    /**
     * @var MethodFactory
     */
    protected $methodFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->methodFactory = new MethodFactory();
        $this->transport     = new Transport(new Client());
    }

    /**
     * @dataProvider getMethodResponses
     */
    public function testSend($methodAlias, $expectedResponseClass)
    {
        $method   = $this->methodFactory->create($methodAlias);
        $response = $this->transport->send($method);

        $this->assertInstanceOf($expectedResponseClass, $response);
    }

    /**
     * @return array
     */
    public function getMethodResponses()
    {
        return [
            [MethodFactory::METHOD_CHAT_POSTMESSAGE, 'ChatPostMessageResponse'],
        ];
    }
}
