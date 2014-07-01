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
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface ApiMethodTransportInterface
{
    /**
     * @param string $url
     */
    public function __construct($url);

    /**
     * @return Request
     */
    public function getRequest();

    /**
     * @return ApiMethodResponseInterface
     */
    public function getResponse();

    /**
     * @return Response
     */
    public function getHttpResponse();

    /**
     * @return ClientInterface
     */
    public function getHttpClient();

    /**
     * @param ApiMethodInterface $method
     * @param RequestInterface   $request
     *
     * @return ApiMethodResponseInterface
     */
    public function send(ApiMethodInterface $method, RequestInterface $request);
}
