<?php

namespace CL\Slack\Tests\Transport;

use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Transport\ApiClient;
use CL\Slack\Transport\Payload\PayloadInterface;

class ApiClientTest extends AbstractTestCase
{
    public function testSendSuccessfully()
    {
        $payloadData = [
            'foo' => 'bar',
        ];

        $responseData = [
            'ok'     => true,
            'error'  => 'This error should get ignored',
            'foobar' => 'john_doe',
        ];

        $response = $this->createApiClient($responseData)->send($this->createPayloadMock($payloadData));

        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\PayloadResponseInterface', $response);
        $this->assertNull($response->getError());
        $this->assertTrue($response->isOk(), 'A good response should return true on "isOk()"-calls');
        $this->assertEquals(['foobar' => $responseData['foobar']], $response->getData());
    }

    public function testSendWithError()
    {
        $payloadData = [
            'foo' => 'bar',
        ];

        $responseData = [
            'ok'    => false,
            'error' => 'Something went wrong!',
            ['This data should not get resolved']
        ];

        $response = $this->createApiClient($responseData)->send($this->createPayloadMock($payloadData));

        $this->assertInstanceOf('\CL\Slack\Transport\Payload\Response\PayloadResponseInterface', $response);
        $this->assertEquals($responseData['error'], $response->getError(), 'Error message should remain intact');
        $this->assertFalse($response->isOk(), 'A bad response should return false on "isOk()"-calls');
        $this->assertNull($response->getData());
    }

    /**
     * @param array $responseBody
     *
     * @return ApiClient
     */
    protected function createApiClient(array $responseBody)
    {
        $requestMockBuilder = $this->getMockBuilder('\GuzzleHttp\Message\RequestInterface');
        $requestMock        = $requestMockBuilder->getMock();
        $requestMock->expects($this->once())->method('getBody')->will($this->returnValue($this->getMock('\GuzzleHttp\Post\PostBody')));

        $responseMockBuilder = $this->getMockBuilder('\GuzzleHttp\Message\ResponseInterface');
        $responseMock        = $responseMockBuilder->getMock();
        $responseMock->expects($this->once())->method('json')->will($this->returnValue($responseBody));

        $httpClientMockBuilder = $this->getMockBuilder('\GuzzleHttp\ClientInterface');
        $httpClientMock        = $httpClientMockBuilder->getMock();
        $httpClientMock->expects($this->once())->method('createRequest')->will($this->returnValue($requestMock));
        $httpClientMock->expects($this->once())->method('send')->will($this->returnValue($responseMock));
        $apiClient = new ApiClient('fake-token', $httpClientMock);

        return $apiClient;
    }

    /**
     * @param array $payloadData
     *
     * @return PayloadInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function createPayloadMock(array $payloadData)
    {
        $payload = $this->getMock('\CL\Slack\Transport\Payload\PayloadInterface');
        $payload->expects($this->once())->method('create')->will($this->returnValue($payloadData));
        $payload->expects($this->once())->method('getResponseClass')->will($this->returnValue('\CL\Slack\Tests\Transport\Payload\PayloadResponseMock'));

        return $payload;
    }
}
