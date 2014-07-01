<?php

namespace CL\Slack\Api\Method;

use CL\Slack\Api\Method\Transport\ApiMethodTransportInterface;

class ApiMethodHelper
{
    /**
     * @var ApiMethodFactory
     */
    protected $methodFactory;

    /**
     * @var Transport\ApiMethodTransportInterface
     */
    protected $methodTransport;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param ApiMethodFactory            $methodFactory
     * @param ApiMethodTransportInterface $methodTransport
     * @param string                      $token
     */
    public function __construct(ApiMethodFactory $methodFactory, ApiMethodTransportInterface $methodTransport, $token)
    {
        $this->methodFactory   = $methodFactory;
        $this->methodTransport = $methodTransport;
        $this->token           = $token;
    }

    /**
     * @param string $methodAlias
     * @param array  $options
     *
     * @return Response\ApiMethodResponseInterface
     */
    public function send($methodAlias, array $options)
    {
        $options  = array_merge(['token' => $this->token], $options);
        $method   = $this->methodFactory->create($methodAlias, $options);
        $request  = $this->methodTransport->getHttpClient()->createRequest('get');
        $response = $this->methodTransport->send($method, $request);

        return $response;
    }
}
