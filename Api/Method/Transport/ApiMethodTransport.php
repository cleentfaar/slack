<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Transport;

use CL\Slack\Api\Method\ApiMethodInterface;
use CL\Slack\Api\Method\Response\ApiMethodResponseInterface;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiMethodTransport implements ApiMethodTransportInterface
{
    /**
     * @var \Guzzle\Http\Client
     */
    protected $httpClient;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ApiMethodResponseInterface
     */
    protected $response;

    /**
     * @var Response
     */
    protected $httpResponse;

    /**
     * {@inheritdoc}
     */
    public function __construct($baseUrl)
    {
        $this->httpClient = new Client($baseUrl);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function send(ApiMethodInterface $method, RequestInterface $request = null)
    {
        if ($request === null) {
            $request = $this->getHttpClient()->createRequest('get');
        }

        $this->response     = null;
        $this->request      = $method->createRequest($request);
        $this->httpResponse = $this->sendRequest($this->request);
        $this->response     = $method->createResponse($this->httpResponse);

        return $this->response;
    }

    /**
     * @param RequestInterface $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    protected function sendRequest(RequestInterface $request)
    {
        try {
            $response = $this->getHttpClient()->send($request);
        } catch (BadResponseException $e) {
            throw new \LogicException(sprintf(
                "Failed to send request: \n%s, \n[body-sent] %s\n[body-returned] %s",
                $e->getMessage(),
                implode(",", $request->getParams()->toArray()),
                $e->getResponse()->getBody(true)
            ));
        }

        if (false === is_object($response) || false === $response instanceof Response) {
            throw new \LogicException(sprintf(
                "Expected client to return a Response instance, got %s",
                var_export($response, true)
            ));
        }

        return $response;
    }
}
