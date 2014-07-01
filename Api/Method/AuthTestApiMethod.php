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

use CL\Slack\Api\Method\Response\AuthTestApiMethodResponse;
use Guzzle\Http\Message\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * This type allows you to test authenticating with the Slack API.
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestApiMethod extends AbstractApiMethod
{
    /**
     * {@inheritdoc}
     */
    public function buildOptions(OptionsResolverInterface &$resolver)
    {
        $resolver->setRequired(['token']);
        $resolver->setAllowedTypes([
            'token' => ['string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function createResponse(Response $response)
    {
        return new AuthTestApiMethodResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'auth.test';
    }
}
