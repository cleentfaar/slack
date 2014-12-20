<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchFile extends File
{
    /**
     * @return SimpleChannel The channel object on which the message was posted
     */
    public function getChannel()
    {
        return $this->data['channel'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(OptionsResolverInterface $resolver)
    {
        parent::configure($resolver);

        $resolver->setAllowedTypes([
            'channel'    => ['\CL\Slack\Model\SimpleChannel'],
        ]);

        $resolver->setNormalizers([
            'channel' => function (Options $options, $value) {
                if (is_array($value)) {
                    $value = new SimpleChannel($value);
                }
                
                return $value;
            },
        ]);
    }
}
