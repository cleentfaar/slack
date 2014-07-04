<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response\Representation;

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class File
{
    use Resolvable;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $this->resolve($data);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'user',
            'type',
            'subtype',
            'text',
            'ts',
        ]);
        $resolver->setAllowedTypes([
            'user'    => ['string'],
            'type'    => ['string'],
            'subtype' => ['string'],
            'text'    => ['string'],
            'ts'      => ['double', 'float'],
        ]);
        $resolver->setAllowedValues([
            'type' => ['message'],
        ]);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
