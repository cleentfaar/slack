<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Response implements ResponseInterface
{
    use Resolvable;

    /**
     * @var array
     */
    protected $data;

    /**
     * {@inheritdoc}
     */
    final public function __construct(array $data)
    {
        $this->data = $this->resolve($data);
    }

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return $this->data['ok'];
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function getError()
    {
        return $this->data['error'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'ok',
        ]);
        $resolver->setOptional([
            'error',
        ]);
        $resolver->setDefaults([
            'ok'    => false,
            'error' => null,
        ]);
        $resolver->setAllowedTypes([
            'ok'    => ['bool'],
            'error' => ['null', 'string'],
        ]);
        $resolver->setAllowedValues([
            'error' => [
                null,
                ResponseInterface::ERROR_ACCOUNT_INACTIVE,
                ResponseInterface::ERROR_CHANNEL_NOT_FOUND,
                ResponseInterface::ERROR_INVALID_TOKEN,
            ]
        ]);

        return $resolver;
    }
}
