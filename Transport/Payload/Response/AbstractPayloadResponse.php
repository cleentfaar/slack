<?php

namespace CL\Slack\Transport\Payload\Response;

use CL\Slack\Exception\SlackException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class AbstractPayloadResponse implements PayloadResponseInterface
{
    /**
     * @var bool
     */
    protected $ok;

    /**
     * @var string|null
     */
    protected $error;

    /**
     * @var string|null
     */
    protected $errorExplanation;

    /**
     * @var array|null
     */
    protected $data;

    /**
     * {@inheritdoc}
     *
     * @throws SlackException If the response data could not be resolved
     */
    public function __construct($ok = false, $error = null, array $data = null)
    {
        $this->ok = $ok;

        if ($ok === true) {
            $resolver = new OptionsResolver();
            $this->configureResolver($resolver);

            try {
                $this->data = $resolver->resolve($ok === true ? $data : null);
            } catch (\Exception $e) {
                throw new SlackException('Failed to resolve response data', null, $e);
            }
        } else {
            $this->error            = $error;
            $this->errorExplanation = PayloadResponseErrors::explain($error);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return $this->ok === true;
    }

    /**
     * {@inheritdoc}
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorExplanation()
    {
        return $this->errorExplanation;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    abstract protected function configureResolver(OptionsResolverInterface $resolver);
}
