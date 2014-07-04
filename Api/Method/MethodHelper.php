<?php

namespace CL\Slack\Api\Method;

use CL\Slack\Api\Method\Response\ResponseInterface;
use CL\Slack\Api\Method\Transport\TransportInterface;

class MethodHelper
{
    /**
     * @var MethodFactory
     */
    protected $methodFactory;

    /**
     * @var Transport\TransportInterface
     */
    protected $methodTransport;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param MethodFactory      $methodFactory
     * @param TransportInterface $methodTransport
     * @param string             $token
     */
    public function __construct(MethodFactory $methodFactory, TransportInterface $methodTransport, $token)
    {
        $this->methodFactory   = $methodFactory;
        $this->methodTransport = $methodTransport;
        $this->token           = $token;
    }

    /**
     * @param string $methodAlias
     * @param array  $options
     *
     * @return ResponseInterface
     */
    public function send($methodAlias, array $options)
    {
        $options = array_merge(['token' => $this->token], $options);
        $method  = $this->methodFactory->create($methodAlias, $options);

        return $this->methodTransport->send($method);
    }
}
