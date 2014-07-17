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
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInfoMethod extends AbstractMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(array $data)
    {
        return new ChannelsInfoResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'channels.info';
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return MethodFactory::METHOD_CHANNELS_INFO;
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
        $resolver->setAllowedTypes([
            'channel' => ['string'],
        ]);
        $resolver->setNormalizers([
            'channel' => function (Options $options, $value) {
                if (substr($value, 0 ,1) === '#') {
                    throw new \Exception(sprintf(
                        'Since channels can change names, I can only give you historic data if supply the actual ID of the channel like C12345, not the name (%s given)',
                        $value
                    ));
                }

                return $value;
            },
        ]);
    }
}
