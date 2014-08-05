<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface ResponseInterface
{
    const ERROR_CHANNEL_NOT_FOUND = 'channel_not_found';
    const ERROR_INVALID_TOKEN     = 'invalid_auth';
    const ERROR_ACCOUNT_INACTIVE  = 'account_inactive';
    const ERROR_MISSING_TOKEN     = 'not_authed';

    /**
     * @param array $data The data returned by Slack, converted from JSON
     */
    public function __construct(array $data);

    /**
     * @return bool
     */
    public function isOk();

    /**
     * @return array
     */
    public function getData();

    /**
     * @return string|null
     */
    public function getError();

    /**
     * @return bool Whether the response returned by this API method is relevant enough for display purposes.
     */
    public function hasRelevantResponse();
}
