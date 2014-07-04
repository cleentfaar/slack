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

use CL\Slack\Api\Method\Response\ResponseInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface MethodInterface
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
     * @param array $data
     *
     * @return ResponseInterface
     */
    public function createResponse(array $data);
}
