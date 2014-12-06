<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport;

use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\ApiClient;
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
        $mockPayload = $this->getMock('CL\Slack\Payload\PayloadInterface');
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
        $apiClient->addListener(ApiClient::EVENT_REQUEST, function ($event) use (&$eventsDispatched, $self) {
            $eventsDispatched[ApiClient::EVENT_REQUEST] = true;
            $self->assertInstanceOf('CL\Slack\Transport\Events\RequestEvent', $event);
        });
        $apiClient->addListener(ApiClient::EVENT_RESPONSE, function ($event) use (&$eventsDispatched, $self) {
            $eventsDispatched[ApiClient::EVENT_RESPONSE] = true;
            $self->assertInstanceOf('CL\Slack\Transport\Events\ResponseEvent', $event);
        });
        $apiClient->send($mockPayload);

        parse_str((string)$history->getLastRequest()->getBody(), $lastRequestContent);
        $lastResponseContent = json_decode($history->getLastResponse()->getBody(), true);

        $this->assertEquals($mockRequestData, $lastRequestContent);
        $this->assertEquals($mockResponseData, $lastResponseContent);
        $this->assertEquals(
            ApiClient::API_BASE_URL . 'mock',
            $history->getLastRequest()->getUrl()
        );

        $this->assertArrayHasKey(ApiClient::EVENT_REQUEST, $eventsDispatched);
        $this->assertArrayHasKey(ApiClient::EVENT_RESPONSE, $eventsDispatched);
    }
}
