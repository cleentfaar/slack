<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\OutgoingWebhook\Request;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class OutgoingWebhookRequest
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
            'token',
            'team_id',
            'channel_id',
            'channel_name',
            'timestamp',
            'user_id',
            'user_name',
            'text',
            'trigger_word',
        ]);
        $resolver->setAllowedTypes([
            'token'        => 'string',
            'team_id'      => 'string',
            'channel_id'   => 'string',
            'channel_name' => 'string',
            'timestamp'    => 'float',
            'user_id'      => 'string',
            'user_name'    => 'string',
            'text'         => 'string',
            'trigger_word' => 'string',
        ]);

        /**
         * This shouldn't be necessary, but GET parameters are
         * never parsed as floats, whatever their value
         */
        $resolver->setNormalizers([
            'timestamp' => function (Options $options, $value) {
                return floatval($value);
            }
        ]);
        $this->validateOptions($options, $resolver);
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->options['token'];
    }

    /**
     * @return string
     */
    public function getTeamId()
    {
        return $this->options['team_id'];
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->options['channel_id'];
    }

    /**
     * @return string
     */
    public function getChannelName()
    {
        return $this->options['channel_name'];
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->options['user_id'];
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->options['user_name'];
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->options['text'];
    }

    /**
     * @return string
     */
    public function getTriggerWord()
    {
        return $this->options['trigger_word'];
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
}
