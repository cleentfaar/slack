<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

use CL\Slack\Exception\SlackException;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayload implements PayloadInterface
{
    /**
     * @var array
     */
    protected $options = [];
    
    final public function __construct()
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults($this->getDefaults());
        
        $this->options = $resolver->resolve([]);
        
        $resolver->setRequired($this->getRequired());
        $resolver->setOptional($this->getOptional());
        $resolver->setAllowedTypes($this->getAllowedTypes());
        $resolver->setAllowedValues($this->getAllowedValues());
        
        $this->resolver = $resolver;
    }

    /**
     * {@inheritdoc}
     * 
     * @throws SlackException If the payload could not be created
     */
    public function create()
    {
        try {
            $requestData = $this->resolver->resolve($this->options);
        } catch (\Exception $e) {
            throw new SlackException(sprintf('Failed to create payload using class "%s" and from options: %s', get_class($this), var_export($this->options, true)), null, $e);
        }
        
        return (array) $requestData;
    }

    /**
     * @return array
     */
    protected function getRequired()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getOptional()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getDefaults()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getAllowedTypes()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getAllowedValues()
    {
        return [];
    }
}
