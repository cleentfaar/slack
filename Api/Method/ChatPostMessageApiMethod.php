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

use CL\Slack\Api\Method\Response\ApiMethodResponse;
use Guzzle\Http\Message\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatPostMessageApiMethod extends AbstractApiMethod
{
    /**
     * {@inheritdoc}
     */
    public function buildOptions(OptionsResolverInterface &$resolver)
    {
        $resolver->setRequired([
            'channel',
            'text',
        ]);
        $resolver->setOptional([
            'username',
            'parse',
            'link_names',
            'attachments',
            'unfurl_links',
            'icon_url',
            'icon_emoji',
        ]);
        $resolver->setAllowedTypes([
            'text'       => ['string'],
            'channel'    => ['string'],
            'username'   => ['string'],
            'icon_url'   => ['string'],
            'icon_emoji' => ['string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function createResponse(Response $response)
    {
        return new ApiMethodResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'chat.postMessage';
    }
}
