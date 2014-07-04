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
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Message
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
        $resolver->setOptional([
            'channel',
            'permalink',
            'previous',
            'previous_2',
            'next',
            'next_2',
            'user',
            'username',
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
            'ts'      => ['float'],
        ]);
        $resolver->setAllowedValues([
            'type' => ['message'],
        ]);
        $resolver->setNormalizers([
            'ts' => function (Options $options, $ts) {
                return floatval($ts);
            },
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
