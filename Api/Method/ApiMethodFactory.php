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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiMethodFactory
{
    /**
     * Registered method classes
     *
     * @var array<string>
     */
    protected $methodClasses;

    /**
     * Registers an API method using a given alias
     *
     * @param string $methodClass The FCQN of the method
     * @param string $alias       The alias to use
     *
     * @throws \InvalidArgumentException
     */
    public function addMethodClass($methodClass, $alias)
    {
        if (true === $this->hasMethodClass($methodClass)) {
            throw new \InvalidArgumentException(sprintf('Method "%s" already registered', $alias));
        }

        $this->methodClasses[$alias] = $methodClass;
    }

    /**
     * @param string $alias The method's alias
     *
     * @return bool True if there is a method with the given alias, false otherwise
     */
    public function hasMethodClass($alias)
    {
        return (true === isset($this->methodClasses[$alias]));
    }

    /**
     * Returns a registered method's class by alias
     *
     * @param string $alias The method's alias
     *
     * @return string The method's FQCN
     *
     * @throws \InvalidArgumentException When there is no method with the given alias
     */
    public function getMethodClass($alias)
    {
        if ($this->hasMethodClass($alias) !== true) {
            throw new \InvalidArgumentException(sprintf('There is no method registered with that alias: "%s"', $alias));
        }

        return $this->methodClasses[$alias];
    }

    /**
     * Returns all available method classes
     *
     * @return array Array of method classes
     */
    public function getMethodClasses()
    {
        return $this->methodClasses;
    }

    /**
     * Creates an ApiMethod object from the given alias and options
     *
     * @param string $alias
     * @param array  $options
     *
     * @return ApiMethodInterface
     */
    public function create($alias, array $options = array())
    {
        $methodClass  = $this->getMethodClass($alias);
        $method = new $methodClass($options);

        return $method;
    }
}
