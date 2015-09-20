<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport;

use CL\Slack\Exception\SlackException;
use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Test\Payload\MockPayload;
use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\ApiClient;
use CL\Slack\Transport\Events\RequestEvent;
use CL\Slack\Transport\Events\ResponseEvent;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiClientTest extends AbstractTestCase
{
    const TOKEN = 'fake-token';

    public function testSend()
    {
        $self = $this;

        $mockRequestData = ['foo' => 'bar', 'token' => self::TOKEN];
        $mockResponseData = ['ok' => true, 'foo' => 'bar'];

        $handler = HandlerStack::create(
            new MockHandler([
                new Response(200, [], json_encode($mockResponseData))
            ])
        );
        $historyContainer = [];
        $history = Middleware::history($historyContainer);
        $handler->push($history);
        $apiClient = new ApiClient(
            self::TOKEN,
            new Client(['handler' => $handler])
        );

        $apiClient->addRequestListener(function (RequestEvent $event) use (&$eventsDispatched, $mockRequestData, $self) {
            $eventsDispatched[ApiClient::EVENT_REQUEST] = true;
            $self->assertEquals($mockRequestData, $event->getRawPayload());
        });

        $apiClient->addResponseListener(function (ResponseEvent $event) use (&$eventsDispatched, $mockResponseData, $self) {
            $eventsDispatched[ApiClient::EVENT_RESPONSE] = true;
            $self->assertEquals($mockResponseData, $event->getRawPayloadResponse());
        });

        $mockPayload = new MockPayload();
        $mockPayload->setFoo('bar');
        $apiClient->send($mockPayload);

        $transaction = $historyContainer[0];

        $requestUrl = (string) $transaction['request']->getUri();
        $requestContentType = $transaction['request']->getHeader('content-type')[0];
        parse_str($transaction['request']->getBody(), $requestBody);
        $responseBody = json_decode($transaction['response']->getBody(), true);

        $this->assertEquals(ApiClient::API_BASE_URL.'mock', $requestUrl);
        $this->assertEquals('application/x-www-form-urlencoded', $requestContentType);
        $this->assertEquals($mockRequestData, $requestBody);
        $this->assertEquals($mockResponseData, $responseBody);

        $this->assertArrayHasKey(ApiClient::EVENT_REQUEST, $eventsDispatched);
        $this->assertArrayHasKey(ApiClient::EVENT_RESPONSE, $eventsDispatched);
    }

    public function testSendWithoutAnyToken()
    {
        /** @var PayloadInterface|\PHPUnit_Framework_MockObject_MockObject $mockPayload */
        $mockPayload = $this->getMock('CL\Slack\Payload\PayloadInterface');
        $apiClient   = new ApiClient();

        try {
            $apiClient->send($mockPayload);
        } catch (SlackException $e) {
            $previous = $e->getPrevious();
            $this->assertInstanceOf('\InvalidArgumentException', $previous);
            $this->assertEquals(
                'You must supply a token to send a payload, since you did not provide one during construction',
                $previous->getMessage()
            );

            return;
        }

        $this->markTestIncomplete('This test should have thrown an exception');
    }
}
