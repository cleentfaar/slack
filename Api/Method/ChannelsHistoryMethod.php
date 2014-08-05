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

use CL\Slack\Api\Method\Response\ChannelsHistoryResponse;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @see https://api.slack.com/methods/channels.history
 *
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsHistoryMethod extends AbstractMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(array $data)
    {
        return new ChannelsHistoryResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'channels.history';
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return MethodFactory::METHOD_CHANNELS_HISTORY;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setRequired([
            'channel',
        ]);
        $resolver->setOptional([
            'latest',
            'oldest',
            'count',
        ]);
        $resolver->setAllowedTypes([
            'channel' => ['string'],
            'latest'  => ['string', 'double', 'float', 'null'],
            'oldest'  => ['string', 'double', 'float', 'null'],
            'count'   => ['integer', 'null'],
        ]);
        $resolver->setNormalizers([
            'channel' => function (Options $options, $value) {
                if (substr($value, 0 ,1) === '#') {
                    throw new \Exception(sprintf(
                        'Since channels can change names, Slack can only show you history if you supply the actual ID' .
                        'of the channel like "C12345", and not the name like "%s"',
                        $value
                    ));
                }

                return $value;
            },
        ]);
    }
}
