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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @return string The query that was used to search
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
