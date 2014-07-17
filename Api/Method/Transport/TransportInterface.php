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
use CL\Slack\Api\Method\Response\ResponseInterface;
use GuzzleHttp\ClientInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface TransportInterface
{
    /**
     * The (base) URL used for all communication with the Slack API.
     */
    const API_BASEURL = 'https://slack.com/api';

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client);

    /**
     * @return ClientInterface
     */
    public function getHttpClient();

    /**
     * @param MethodInterface $method
     *
     * @return ResponseInterface
     */
    public function send(MethodInterface $method);
}
