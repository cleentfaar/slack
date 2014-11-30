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
use CL\Slack\Payload\AbstractPostPayload;
use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Transport\Events\AfterEvent;
use CL\Slack\Transport\Events\BeforeEvent;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Post\PostBody;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiClient
{
    /**
     * The (base) URL used for all communication with the Slack API.
     */
    const API_BASE_URL = 'https://slack.com/api/';

    /**
     * @var string|null
     */
    private $token;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param SerializerInterface           $serializer
     * @param ValidatorInterface            $validator
     * @param ClientInterface|null          $httpClient
     * @param EventDispatcherInterface|null $dispatcher
     * @param string|null                   $token
     */
    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ClientInterface $httpClient = null,
        EventDispatcherInterface $dispatcher = null,
        $token = null
    ) {
        $this->serializer      = $serializer;
        $this->validator       = $validator;
        $this->httpClient      = $httpClient ?: new Client();
        $this->eventDispatcher = $dispatcher ?: new EventDispatcher();
        $this->token           = $token;
    }

    /**
     * @param PayloadInterface $payload The payload to send
     * @param string|null      $token   Optional token to use during the API-call,
     *                                  defaults to the one configured during construction
     *
     * @throws SlackException If the payload could not be sent
     *
     * @return PayloadResponseInterface Actual class depends on the payload used,
     *                                  e.g. chat.postMessage will return ChatPostMessagePayloadResponse
     */
    public function send(PayloadInterface $payload, $token = null)
    {
        try {
            if ($token === null && $this->token === null) {
                throw new \LogicException('You must supply a token to send a payload if you did not provide one during construction');
            }

            $this->validatePayload($payload);

            $serializedPayload = $this->serializePayload($payload, $token);
            $request           = $this->createRequest($payload, $serializedPayload);

            $this->eventDispatcher->dispatch(ApiClientEvents::EVENT_BEFORE, new BeforeEvent($serializedPayload));

            $response = $this->httpClient->send($request);
        } catch (\Exception $e) {
            throw new SlackException('Failed to send payload to the Slack API', null, $e);
        }

        try {
            $responseClass = $payload->getResponseClass();
            $responseData  = $response->getBody()->getContents();

            $this->eventDispatcher->dispatch(ApiClientEvents::EVENT_AFTER, new AfterEvent(json_decode($responseData, true) ?: []));

            return $this->deserializeResponse($responseData, $responseClass);
        } catch (\Exception $e) {
            throw new SlackException('Failed to process response from the Slack API', null, $e);
        }
    }

    /**
     * @param string $responseContent
     * @param string $responseClass
     *
     * @throws SlackException
     *
     * @return PayloadResponseInterface
     */
    private function deserializeResponse($responseContent, $responseClass)
    {
        $deserializedResponse = $this->serializer->deserialize($responseContent, $responseClass, 'json');

        if (!is_object($deserializedResponse)) {
            throw new SlackException('The response could not be deserialized into an object');
        }

        if (!($deserializedResponse instanceof $responseClass)) {
            throw new SlackException(sprintf(
                'The response could not be deserialized into a payload response object (%s is not an instance of %s)',
                get_class($deserializedResponse),
                $responseClass
            ));
        }

        return $deserializedResponse;
    }

    /**
     * @param string   $event
     * @param callable $callable
     */
    public function addListener($event, $callable)
    {
        $this->eventDispatcher->addListener($event, $callable);
    }

    /**
     * @param PayloadInterface $payload
     * @param array            $serializedPayload
     *
     * @return RequestInterface
     */
    private function createRequest(PayloadInterface $payload, array $serializedPayload)
    {
        if ($payload instanceof AbstractPostPayload) {
            $request = $this->httpClient->createRequest('POST');
            $request->setUrl(self::API_BASE_URL . $payload->getMethod());

            $body = new PostBody();
            $body->replaceFields($serializedPayload);

            $request->setBody($body);
        } else {
            $request = $this->httpClient->createRequest('GET');
            $request->setUrl(self::API_BASE_URL . $payload->getMethod());
            $request->setQuery($serializedPayload);
        }

        return $request;
    }

    /**
     * @param PayloadInterface $payload
     * @param string|null      $token
     *
     * @return array
     */
    private function serializePayload(PayloadInterface $payload, $token = null)
    {
        $serializedPayload          = json_decode($this->serializer->serialize($payload, 'json'), true);
        $serializedPayload['token'] = $token ?: $this->token;

        return $serializedPayload;
    }

    /**
     * @param PayloadInterface $payload
     *
     * @throws SlackException If the payload could not be validated before creating the request
     */
    private function validatePayload(PayloadInterface $payload)
    {
        $constraintViolationList = $this->validator->validate($payload);

        if ($constraintViolationList->count() > 0) {
            throw $this->createValidationException($constraintViolationList, $payload);
        }
    }

    /**
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param object                           $validatedObject
     *
     * @return SlackException
     */
    private function createValidationException(ConstraintViolationListInterface $constraintViolationList, $validatedObject)
    {
        $violations = '';
        foreach ($constraintViolationList as $constraintViolation) {
            /** @var ConstraintViolationInterface $constraintViolation */
            $violations .= sprintf(
                "%s: %s\n",
                $constraintViolation->getPropertyPath(),
                $constraintViolation->getMessage()
            );
        }

        return new SlackException(sprintf('Validation failed for object of class %s: %s', get_class($validatedObject), $violations));
    }
}
