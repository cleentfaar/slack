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
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Transport implements TransportInterface
{
    const API_BASEURL = 'https://slack.com/api';

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
        $request = $this->httpClient->get('get');
        $request->setUrl(self::API_BASEURL . '/' . $method->getSlug());
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
