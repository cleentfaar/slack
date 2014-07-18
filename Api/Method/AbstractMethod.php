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

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractMethod implements MethodInterface
{
    use Resolvable;

    /**
     * @var array
     */
    protected $options;

    /**
     * @param array $options
     */
    final public function __construct(array $options)
    {
        $this->options = $this->resolve($options);
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'token'
        ]);
        $resolver->setAllowedTypes([
            'token' => 'string'
        ]);
    }
}
