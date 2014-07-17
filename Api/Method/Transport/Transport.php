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

use CL\Slack\Api\Method\MethodInterface;
use GuzzleHttp\ClientInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Transport implements TransportInterface
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * {@inheritdoc}
     */
    public function __construct(ClientInterface $client)
    {
        $this->httpClient = $client;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \LogicException If the response returned by Slack could not be parsed properly (i.e. non-JSON)
     */
    public function send(MethodInterface $method)
    {
        $request = $this->httpClient->createRequest('get', self::API_BASEURL . '/' . $method->getSlug());
        $request->getQuery()->replace($method->getOptions());
        $response = $this->httpClient->send($request);
        $data     = json_decode($response->getBody(true), true);

        if (!is_array($data)) {
            throw new \LogicException(sprintf(
                'Expected Slack\'s response to be decoded into an array, got: %s',
                gettype($data)
            ));
        }

        return $method->createResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
}
