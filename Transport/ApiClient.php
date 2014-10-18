<?php

namespace CL\Slack\Transport;

use CL\Slack\Exception\SlackException;
use CL\Slack\Transport\Payload\PayloadInterface;
use CL\Slack\Transport\Payload\Response\PayloadResponseInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;

class ApiClient
{
    /**
     * The (base) URL used for all communication with the Slack API. Any placeholder gets replaced with the
     * slug of the payload that is sent.
     */
    const API_BASE_URL = 'https://slack.com/api/%s';

    /**
     * @var string
     */
    protected $token;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @param ClientInterface|null $httpClient Leave null to use the default client
     */
    public function __construct($token, ClientInterface $httpClient = null)
    {
        $this->token      = $token;
        $this->httpClient = $httpClient ?: new Client();
    }

    /**
     * @param PayloadInterface $payload The payload to send
     *
     * @return PayloadResponseInterface Actual class depends on the payload used,
     *                                  e.g. chat.postMessage will return ChatPostMessagePayloadResponse
     *
     * @throws SlackException If the payload could not be sent
     */
    public function send(PayloadInterface $payload)
    {
        try {
            $response = $this->httpClient->send($this->createRequest($payload));
        } catch (\Exception $e) {
            throw new SlackException('Failed to send payload to the Slack API', null, $e);
        }

        return $this->createResponse($payload, $response);
    }

    /**
     * @param PayloadInterface $payload
     *
     * @return RequestInterface
     */
    private function createRequest(PayloadInterface $payload)
    {
        $request = $this->httpClient->createRequest('POST');
        $request->setUrl(sprintf(static::API_BASE_URL, $payload->getSlug()));
        
        /** @var \GuzzleHttp\Post\PostBodyInterface $postBody */
        $postBody = $request->getBody();
        $postBody->replaceFields($payload->create());
        $postBody->setField('token', $this->token);
        
        return $request;
    }

    /**
     * @param PayloadInterface  $payload
     * @param ResponseInterface $response
     *
     * @return PayloadResponseInterface
     *
     * @throws SlackException If the response class returned by the payload does not exist
     */
    private function createResponse(PayloadInterface $payload, ResponseInterface $response)
    {
        $data = $response->json(['object' => false]);
        $ok   = $data['ok'];
        unset($data['ok']);

        $error = null;
        if (array_key_exists('error', $data)) {
            $error = $data['error'];
            unset($data['error']);
        }
        
        $responseClass = $payload->getResponseClass();

        if (!class_exists($responseClass)) {
            throw new SlackException(sprintf('Response class returned by payload does not exist: %s', $responseClass));
        }

        return new $responseClass($ok, $error, $data);
    }
}
