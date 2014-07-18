<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchResponse extends Response
{
    /**
     * @return string|null
     */
    public function getQuery()
    {
        return $this->data['query'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);
        $resolver->setOptional([
            'query',
        ]);
        $resolver->setDefaults([
            'query'   => '',
        ]);
        $resolver->setAllowedTypes([
            'query'    => ['string'],
        ]);
    }
}
