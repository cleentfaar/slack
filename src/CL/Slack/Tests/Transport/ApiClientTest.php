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
use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\ApiClient;
use CL\Slack\Transport\Events\RequestEvent;
use CL\Slack\Transport\Events\ResponseEvent;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\History;
use GuzzleHttp\Subscriber\Mock;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiClientTest extends AbstractTestCase
{
    const TOKEN = 'fake-token';

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        //$this->serializer = SerializerBuilder::create()->build();
    }

    public function testSend()
    {
        $eventsDispatched = [];
        $history          = new History();
        $mock             = new Mock();
        $mockRequestData  = [
            'foo'   => 'bar',
            'token' => self::TOKEN,
        ];
        $mockResponseData = [
            'ok'  => true,
            'foo' => 'bar',
        ];

        $self                = $this;
        $mockPayloadResponse = $this->getMock('CL\Slack\Payload\PayloadResponseInterface');

        $serializerBuilder = $this->getMockBuilder('JMS\Serializer\Serializer');
        $serializerBuilder->disableOriginalConstructor();
        $serializer = $serializerBuilder->getMock();
        $serializer->expects($this->once())->method('serialize')->willReturn(json_encode($mockRequestData));
        $serializer->expects($this->once())->method('deserialize')->willReturn($mockPayloadResponse);

        /** @var PayloadInterface|\PHPUnit_Framework_MockObject_MockObject $mockPayload */
        $mockPayload = $this->getMock('CL\Slack\Payload\AbstractGetPayload');
        $mockPayload->expects($this->any())->method('getMethod')->willReturn('mock');
        $mockPayload->expects($this->any())->method('getResponseClass')->willReturn('CL\Slack\Tests\Payload\MockPayloadResponse');

        $mockResponseBody = json_encode($mockResponseData);
        $mock->addResponse(sprintf(
                               "HTTP/1.1 200 OK\r\nContent-Length: %d\r\n\r\n%s",
                               strlen($mockResponseBody),
                               $mockResponseBody
                           ));

        $client = new Client();
        $client->getEmitter()->attach($history);
        $client->getEmitter()->attach($mock);

        $apiClient = new ApiClient(self::TOKEN, $serializer, $client);
        $apiClient->addListener(ApiClient::EVENT_REQUEST, function (RequestEvent $event) use (&$eventsDispatched, $mockRequestData, $self) {
            $eventsDispatched[ApiClient::EVENT_REQUEST] = true;
            $self->assertEquals($mockRequestData, $event->getRawPayload());
        });
        $apiClient->addListener(ApiClient::EVENT_RESPONSE, function (ResponseEvent $event) use (&$eventsDispatched, $mockResponseData, $self) {
            $eventsDispatched[ApiClient::EVENT_RESPONSE] = true;
            $self->assertEquals($mockResponseData, $event->getRawPayloadResponse());
        });
        $apiClient->send($mockPayload);

        $lastRequest = $history->getLastRequest();

        if ($lastRequest->getMethod() !== 'POST') {
            parse_str((string)$lastRequest->getQuery(), $lastRequestContent);
            $expectedUrl        = ApiClient::API_BASE_URL . 'mock?' . http_build_query($mockRequestData);
            $lastRequestContent = $lastRequest->getQuery()->toArray();
        } else {
            $expectedUrl        = ApiClient::API_BASE_URL . 'mock';
            $lastRequestContent = json_decode($lastRequest->getBody(), true);
        }

        $lastResponseContent = json_decode($history->getLastResponse()->getBody(), true);

        $this->assertEquals($mockRequestData, $lastRequestContent);
        $this->assertEquals($mockResponseData, $lastResponseContent);
        $this->assertEquals($expectedUrl, $history->getLastRequest()->getUrl());

        $this->assertArrayHasKey(ApiClient::EVENT_REQUEST, $eventsDispatched);
        $this->assertArrayHasKey(ApiClient::EVENT_RESPONSE, $eventsDispatched);
    }

    public function testSendWithoutAnyToken()
    {
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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown event to add listener for (unknown-event)
     */
    public function testAddListenerForUnknownEvent()
    {
        $apiClient = new ApiClient();
        $apiClient->addListener('unknown-event', function () {
        });
    }
}
