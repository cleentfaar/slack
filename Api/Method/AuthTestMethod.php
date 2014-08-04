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

use CL\Slack\Api\Method\Response\AuthTestResponse;

/**
 * @see https://api.slack.com/methods/auth.test
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestMethod extends AbstractMethod
{
    /**
     * {@inheritdoc}
     *
     * @return AuthTestResponse
     */
    public function createResponse(array $data)
    {
        return new AuthTestResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return MethodFactory::METHOD_AUTH_TEST;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'auth.test';
    }
}
