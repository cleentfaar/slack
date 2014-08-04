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

use CL\Slack\Api\Method\Response\ChatPostMessageResponse;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChatPostMessageMethod extends AbstractMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(array $data)
    {
        return new ChatPostMessageResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return MethodFactory::METHOD_CHAT_POSTMESSAGE;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'chat.postMessage';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);
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
        $resolver->setNormalizers([
            'channel' => function (Options $options, $value) {
                return '#' . ltrim($value, '#');
            },
        ]);
    }
}
