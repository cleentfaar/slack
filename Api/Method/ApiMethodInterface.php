<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method;

use CL\Slack\Api\Method\Response\ApiMethodResponseInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface ApiMethodInterface
{
    /**
     * @return string
     */
    public static function getSlug();

    /**
     * @return string
     */
    public static function getAlias();

    /**
     * @return array
     */
    public function getOptions();

    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    public function createRequest(RequestInterface $request);

    /**
     * @param Response $response
     *
     * @return ApiMethodResponseInterface
     */
    public function createResponse(Response $response);
}
