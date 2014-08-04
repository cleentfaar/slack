<?php

namespace CL\Slack;

use CL\Slack\Exception\SlackException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * This trait is used by various classes in the Slack library to constrain any given options using the OptionsResolver
 */
trait Resolvable
{
    /**
     * @param array $options The options to resolve.
     *
     * @return array The resolved options.
     *
     * @throws SlackException When the (initial configuring or) resolving of the OptionsResolver fails.
     */
    public function resolve(array $options)
    {
        try {
            if ($this->resolver === null) {
                $resolver = new OptionsResolver();
                $this->configureResolver($resolver);
                $this->resolver = $resolver;
            }

            var_dump($options);
            return $this->resolver->resolve($options);
        } catch (\Exception $e) {
            throw new SlackException(sprintf('Failed to resolve options for %s', get_class($this)), null, $e);
        }
    }

    /**
     * The OptionsResolver instance that will constrain the given options
     *
     * @var OptionsResolverInterface|null
     */
    protected $resolver;

    /**
     * Configures the OptionsResolver which will constrain any options that are set for this object
     *
     * @param OptionsResolverInterface $resolver
     */
    abstract protected function configureResolver(OptionsResolverInterface $resolver);
}
