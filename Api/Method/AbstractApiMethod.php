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

use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\RequestInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractApiMethod implements ApiMethodInterface
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @param array $options
     */
    public function __construct(array $options)
    {
        $resolver = new OptionsResolver();
        $resolver->setRequired([
            'token'
        ]);
        $resolver->setAllowedTypes([
            'token' => 'string'
        ]);
        $this->buildOptions($resolver);
        $this->validateOptions($options, $resolver);
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function createRequest(RequestInterface $request)
    {
        if ($request->getMethod() !== Request::GET) {
            throw new \InvalidArgumentException("API methods only support GET-requests");
        }

        $request->setUrl(sprintf($request->getUrl(), $this->getSlug()));

        $request->getQuery()->merge($this->getOptions());

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array                    $options
     * @param OptionsResolverInterface $resolver
     */
    protected function validateOptions(array $options, OptionsResolverInterface $resolver)
    {
        $resolver->resolve($options);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return static::getSlug();
    }

    /**
     * @param OptionsResolverInterface $resolver
     *
     * @return OptionsResolverInterface
     */
    abstract protected function buildOptions(OptionsResolverInterface &$resolver);
}
