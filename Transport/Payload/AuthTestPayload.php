<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

use CL\Slack\Transport\Payload\Response\AuthTestPayloadResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *         
 * @see Official documentation at https://api.slack.com/methods/auth.test
 */
class AuthTestPayload extends AbstractPayload
{
    /**
     * {@inheritdoc}
     *
     * @return AuthTestPayloadResponse
     */
    public function getResponseClass()
    {
        return '\CL\Slack\Transport\Payload\Response\AuthTestPayloadResponse';
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'auth.test';
    }
}
