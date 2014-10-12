<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload\Response;

use CL\Slack\Model\Channel;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsInfoPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @return Channel
     */
    public function getChannel()
    {
        return $this->data['channel'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'channel',
        ]);
        
        $resolver->setAllowedTypes([
            'channel' => ['\CL\Slack\Model\Channel'],
        ]);
        
        $resolver->setNormalizers([
            'channel' => function (Options $options, $channel) {
                if (is_array($channel)) {
                    return new Channel($channel);
                }

                return null;
            },
        ]);
    }
}
