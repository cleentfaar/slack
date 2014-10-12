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

use CL\Slack\Exception\SlackException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractModel implements \JsonSerializable
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     *
     * @throws SlackException If the provided data could not be resolved
     */
    public function __construct(array $data)
    {
        $resolver = new OptionsResolver();
        $this->configureResolver($resolver);
        
        try {
            $this->data = $resolver->resolve($data);
        } catch (\Exception $e) {
            throw new SlackException(sprintf(
                'Failed to resolve data for model "%s"', 
                get_class($this)
            ), null, $e);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->data;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    abstract protected function configureResolver(OptionsResolverInterface $resolver);
}
