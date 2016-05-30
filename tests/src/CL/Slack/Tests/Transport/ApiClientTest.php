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

use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Test\Payload\PayloadMock;
use CL\Slack\Transport\ApiClient;
use CL\Slack\Transport\Events\RequestEvent;
use CL\Slack\Transport\Events\ResponseEvent;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Mockery as Mock;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_send_a_payload()
    {
        $self = $this;
        $token = 'fake-token';

        $mockRequestData = ['fruit' => 'apple', 'token' => $token];
        $mockResponseData = ['ok' => true, 'fruit' => 'apple'];

        $handler = HandlerStack::create(
            new MockHandler([
                new Response(200, [], json_encode($mockResponseData)),
            ])
        );
        $historyContainer = [];
        $history = Middleware::history($historyContainer);
        $handler->push($history);
        $apiClient = new ApiClient(
            $token,
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

        $payload = new PayloadMock();
        $payload->setFruit($mockRequestData['fruit']);

        $apiClient->send($payload);

        $transaction = $historyContainer[0];
        $requestUrl = (string) $transaction['request']->getUri();
        $requestContentType = $transaction['request']->getHeader('content-type')[0];
        parse_str($transaction['request']->getBody(), $requestBody);
        $responseBody = json_decode($transaction['response']->getBody(), true);

        $this->assertEquals(ApiClient::API_BASE_URL . 'mock', $requestUrl);
        $this->assertEquals('application/x-www-form-urlencoded', $requestContentType);
        $this->assertEquals($mockRequestData, $requestBody);
        $this->assertEquals($mockResponseData, $responseBody);

        $this->assertArrayHasKey(ApiClient::EVENT_REQUEST, $eventsDispatched);
        $this->assertArrayHasKey(ApiClient::EVENT_RESPONSE, $eventsDispatched);
    }

    /**
     * @test
     *
     * @expectedException \CL\Slack\Exception\SlackException
     * @expectedExceptionMessage You must supply a token to send a payload, since you did not provide one during construction
     */
    public function it_can_not_send_a_payload_without_a_token()
    {
        /* @var PayloadInterface|Mock\MockInterface $mockPayload */
        $mockPayload = Mock::mock(PayloadInterface::class);

        $apiClient = new ApiClient();
        $apiClient->send($mockPayload);
    }
}
