<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Model;

use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Message extends SimpleMessage
{
    /**
     * @return string The Slack channel on which the message was posted
     */
    public function getChannel()
    {
        return $this->data['channel'];
    }

    /**
     * @return string URL pointing to a single page of the message containing details and comments.
     */
    public function getPermalink()
    {
        return $this->data['permalink'];
    }

    /**
     * @return SimpleMessage|null The message that was posted before this message, or null if there wasn't one
     */
    public function getPrevious()
    {
        return $this->data['previous'];
    }

    /**
     * @return SimpleMessage|null The message that was posted before the previous message, or null if there wasn't one
     */
    public function getPrevious2()
    {
        return $this->data['previous_2'];
    }

    /**
     * @return SimpleMessage|null The message that was posted after this message, or null if there wasn't one
     */
    public function getNext()
    {
        return $this->data['next'];
    }

    /**
     * @return SimpleMessage|null The message that was posted after the next message, or null if there wasn't one
     */
    public function getNext2()
    {
        return $this->data['next_2'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        parent::configureResolver($resolver);

        $resolver->setRequired([
            'channel',
            'permalink',
            'previous',
            'previous_2',
            'next',
            'next_2',
        ]);
        $resolver->setAllowedTypes([
            'channel'    => ['string'],
            'permalink'  => ['string'],
            'previous'   => ['CL\Slack\Api\Method\Model\SimpleMessage', 'null'],
            'previous_2' => ['CL\Slack\Api\Method\Model\SimpleMessage', 'null'],
            'next'       => ['CL\Slack\Api\Method\Model\SimpleMessage', 'null'],
            'next2'      => ['CL\Slack\Api\Method\Model\SimpleMessage', 'null'],
        ]);
        $simpleMessageNormalizer = function (Options $options, $messageData) {
            if (is_array($messageData)) {
                return new SimpleMessage($messageData);
            }

            return null;
        };
        $resolver->setNormalizers([
            'previous'   => $simpleMessageNormalizer,
            'previous_2' => $simpleMessageNormalizer,
            'next'       => $simpleMessageNormalizer,
            'next_2'     => $simpleMessageNormalizer,
        ]);
    }
}
