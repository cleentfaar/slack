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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractSearchMethod extends AbstractMethod
{
    const SORT_SCORE     = 'score';
    const SORT_TIMESTAMP = 'timestamp';

    const SORT_DIR_ASC  = 'asc';
    const SORT_DIR_DESC = 'desc';

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);
        $resolver->setRequired(['query']);
        $resolver->setOptional([
            'sort',
            'sort_dir',
            'highlight',
            'count',
            'page',
        ]);
        $resolver->setAllowedTypes([
            'query'     => ['string'],
            'sort'      => ['string'],
            'highlight' => ['string'],
            'count'     => ['integer'],
            'page'      => ['integer'],
        ]);
        $resolver->setAllowedValues([
            'sort'      => [self::SORT_SCORE, self::SORT_TIMESTAMP],
            'sort_dir'  => [self::SORT_DIR_ASC, self::SORT_DIR_DESC],
            'highlight' => ['1', '0'],
        ]);
        $resolver->setNormalizers([
            'highlight' => function ($value) {
                return $value === true ? '1' : '0';
            },
        ]);
    }
}
