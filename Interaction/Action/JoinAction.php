<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Action;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class JoinAction extends AbstractAction
{
    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setRequired([
            'ts',
            'member',
            'channel',
        ]);
        $resolver->setAllowedTypes([
            'member'  => ['\CL\Slack\Model\Member'],
            'text'    => ['string'],
            'channel' => ['string'],
        ]);
    }
}
