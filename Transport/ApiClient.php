<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport;

use CL\Slack\Exception\SlackException;
use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Transport\Events\ResponseEvent;
use CL\Slack\Transport\Events\RequestEvent;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Post\PostBody;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ApiClient
{
    /**
     * The (base) URL used for all communication with the Slack API.
     */
    const API_BASE_URL = 'https://slack.com/api/';

    /**
     * Event triggered just before it's sent to the Slack API
     * Any listeners are passed the request data (array) as the first argument
     */
    const EVENT_REQUEST = 'EVENT_REQUEST';

    /**
     * Event triggered just before it's sent to the Slack API
     * Any listeners are passed the response data (array) as the first argument
     */
    const EVENT_RESPONSE = 'EVENT_RESPONSE';

    /**
     * @var string|null
     */
    private $token;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param string|null                   $token
     * @param SerializerInterface|null      $serializer
     * @param ClientInterface|null          $client
     * @param EventDispatcherInterface|null $eventDispatcher
     */
    public function __construct(
        $token = null,
        SerializerInterface $serializer = null,
        ClientInterface $client = null,
        EventDispatcherInterface $eventDispatcher = null
    ) {
        $this->token           = $token;
        $this->serializer      = $serializer ?: SerializerBuilder::create()->build();
        $this->client          = $client ?: new Client();
        $this->eventDispatcher = $eventDispatcher ?: new EventDispatcher();
    }

    /**
     * @param PayloadInterface $payload The payload to send
     * @param string|null      $token   Optional token to use during the API-call,
     *                                  defaults to the one configured during construction
     *
     * @throws SlackException If the payload could not be sent
     *
     * @return PayloadResponseInterface Actual class depends on the payload used,
     *                                  e.g. chat.postMessage will return an instance of ChatPostMessagePayloadResponse
     */
    public function send(PayloadInterface $payload, $token = null)
    {
        try {
            if ($token === null && $this->token === null) {
                throw new \InvalidArgumentException('You must supply a token to send a payload, since you did not provide one during construction');
            }

            $serializedPayload = $this->serializePayload($payload);
            $responseData      = $this->doSend($payload->getMethod(), $serializedPayload, $token);

            return $this->deserializeResponse($responseData, $payload->getResponseClass());
        } catch (\Exception $e) {
            throw new SlackException('Failed to send payload to the Slack API', null, $e);
        }
    }

    /**
     * @param string   $event
     * @param callable $callable
     */
    public function addListener($event, $callable)
    {
        $allowedEvents = [self::EVENT_REQUEST, self::EVENT_RESPONSE];
        if (!in_array($event, $allowedEvents)) {
            throw new \InvalidArgumentException(sprintf(
                'Unknown event to add listener for (%s), must be one of: %s',
                $event,
                implode(', ', $allowedEvents)
            ));
        }

        $this->eventDispatcher->addListener($event, $callable);
    }

    /**
     * @param string $method
     * @param array  $data
     * @param null   $token
     *
     * @throws SlackException
     *
     * @return array
     */
    private function doSend($method, array $data, $token = null)
    {
        try {
            $this->eventDispatcher->dispatch(self::EVENT_REQUEST, new RequestEvent($data));

            $request = $this->createRequest($method, $data, $token);

            /** @var ResponseInterface $response */
            $response = $this->client->send($request);
        } catch (\Exception $e) {
            throw new SlackException('Failed to send raw payload to the Slack API', null, $e);
        }

        try {
            $responseData = $response->json();
            if (!is_array($responseData)) {
                throw new \Exception(sprintf(
                    'Expected JSON-decoded response data to be of type "array", got "%s"',
                    gettype($responseData)
                ));
            }

            $this->eventDispatcher->dispatch(self::EVENT_RESPONSE, new ResponseEvent($responseData));

            return $responseData;
        } catch (\Exception $e) {
            throw new SlackException('Failed to process response from the Slack API', null, $e);
        }
    }

    /**
     * @param array  $responseData
     * @param string $responseClass
     *
     * @throws SlackException
     *
     * @return PayloadResponseInterface
     */
    private function deserializeResponse(array $responseData, $responseClass)
    {
        $deserializedResponse = $this->serializer->deserialize(json_encode($responseData), $responseClass, 'json');

        if (!is_object($deserializedResponse) || !($deserializedResponse instanceof PayloadResponseInterface)) {
            throw new SlackException('The response could not be deserialized into a PayloadResponse object');
        }

        return $deserializedResponse;
    }

    /**
     * @param string      $method
     * @param array       $payload
     * @param string|null $token
     * @param string      $requestMethod
     *
     * @return RequestInterface
     */
    private function createRequest($method, array $payload, $token = null, $requestMethod = 'GET')
    {
        $payload['token'] = $token ?: $this->token;

        if ($requestMethod !== 'GET') {
            $request = $this->client->createRequest('POST');
            $request->setUrl(self::API_BASE_URL . $method);

            $body = new PostBody();
            $body->replaceFields($payload);

            $request->setBody($body);
        } else {
            $request = $this->client->createRequest('GET');
            $request->setUrl(self::API_BASE_URL . $method);
            $request->setQuery($payload);
        }

        return $request;
    }

    /**
     * @param PayloadInterface $payload
     *
     * @return array
     */
    private function serializePayload(PayloadInterface $payload)
    {
        return json_decode($this->serializer->serialize($payload, 'json'), true);
    }
}
