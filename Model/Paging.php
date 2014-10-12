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

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Paging extends AbstractModel
{
    /**
     * @return int
     */
    public function getCount()
    {
        return $this->data['count'];
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->data['total'];
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->data['page'];
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->data['pages'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'page',
        ]);
        
        $resolver->setOptional([
            'count',
            'total',
            'pages',
            'first',
            'last',
            'page_count',
            'per_page',
            'total_count',
        ]);

        $resolver->setAllowedTypes([
            'count'       => ['integer'],
            'total'       => ['integer'],
            'page'        => ['integer'],
            'pages'       => ['integer'],
            'first'       => ['bool'],
            'last'        => ['bool'],
            'page_count'  => ['integer'],
            'per_page'    => ['integer'],
            'total_count' => ['integer'],
        ]);
        
        $resolver->setNormalizers([
            'first' => function (Options $options, $value) {
                return (bool) $value;
            },
            'last' => function (Options $options, $value) {
                return (bool) $value;
            },
        ]);
    }
}
