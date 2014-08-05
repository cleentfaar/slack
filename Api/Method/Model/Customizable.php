<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Customizable extends AbstractModel
{
    /**
     * @return string The value of this customizable
     */
    public function getValue()
    {
        return $this->data['value'];
    }

    /**
     * @return string The user ID of the member that created this customizable.
     */
    public function getCreator()
    {
        return $this->data['type'];
    }

    /**
     * @return \DateTime|null The last date on which this customizable was customized ^_^,
     *                        or null if this was the first change
     */
    public function getLastSet()
    {
        return $this->data['last_set'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'value',
            'creator',
        ]);
        $resolver->setOptional([
            'last_set',
        ]);
        $resolver->setAllowedTypes([
            'value'    => ['string'],
            'creator'  => ['string'],
            'last_set' => ['\DateTime', 'null'],
        ]);
        $resolver->setNormalizers([
            'last_set' => function (Options $options, $lastSet) {
                if ($lastSet) {
                    return new \DateTime($lastSet);
                }

                return null;
            },
        ]);
    }
}
