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

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Message extends SimpleMessage
{
    /**
     * @return Channel The channel object on which the message was posted
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
     * Slack messed up something with there naming; now having both a 'next2' and a 'next_2' entry. This getter serves
     * as a backup to still be able to access the 'next2' value.
     * 
     * @return SimpleMessage|null The (alternative) message that was posted after the next message, or null if there wasn't one
     */
    public function getNext2Alt()
    {
        return $this->data['next2'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(OptionsResolverInterface $resolver)
    {
        parent::configure($resolver);

        $resolver->setRequired([
            'channel',
            'permalink',
        ]);

        $resolver->setOptional([
            'previous',
            'previous_2',
            'next',
            'next2', // sigh, stop making typos Slack!
            'next_2',
        ]);
        
        $resolver->setAllowedTypes([
            'channel'    => ['\CL\Slack\Model\Channel'],
            'permalink'  => ['string'],
            'previous'   => ['\CL\Slack\Model\SimpleMessage', 'null'],
            'previous_2' => ['\CL\Slack\Model\SimpleMessage', 'null'],
            'next'       => ['\CL\Slack\Model\SimpleMessage', 'null'],
            'next2'      => ['\CL\Slack\Model\SimpleMessage', 'null'],
            'next_2'     => ['\CL\Slack\Model\SimpleMessage', 'null'],
        ]);

        $simpleMessageNormalizer = function (Options $options, $messageData) {
            if (is_array($messageData)) {
                $messageData = new SimpleMessage($messageData);
            }

            return $messageData;
        };

        $resolver->setNormalizers([
            'channel' => function (Options $options, $value) {
                if (is_array($value)) {
                    $value = new Channel($value);
                }
                
                return $value;
            },
            'previous'   => $simpleMessageNormalizer,
            'previous_2' => $simpleMessageNormalizer,
            'next'       => $simpleMessageNormalizer,
            'next_2'     => $simpleMessageNormalizer,
            'next2'      => $simpleMessageNormalizer,
        ]);
    }
}
