<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SimpleChannel extends AbstractModel
{
    /**
     * @return string The ID of this channel.
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string The name of the channel, without a leading hash sign.
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'id',
            'name',
        ]);

        $resolver->setAllowedTypes([
            'id'   => ['string'],
            'name' => ['string'],
        ]);
    }
}
