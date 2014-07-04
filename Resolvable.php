<?php

namespace CL\Slack;

use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;
use Symfony\Component\OptionsResolver\Exception\OptionDefinitionException;
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
     * @throws OptionDefinitionException If configuration of the OptionsResolver failed before the options can be resolved.
     * @throws MissingOptionsException   If the response from Slack is missing one or more key/value pairs.
     * @throws InvalidOptionsException   If the response from Slack contained one or more unexpected key/values.
     */
    public function resolve(array $options)
    {
        if ($this->resolver === null) {
            $resolver = new OptionsResolver();
            $this->configureResolver($resolver);
            $this->resolver = $resolver;
        }

        try {
            return $this->resolver->resolve($options);
        } catch (MissingOptionsException $e) {
            throw $e;
        } catch (InvalidOptionsException $e) {
            throw $e;
        } catch (OptionDefinitionException $e) {
            throw $e;
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
