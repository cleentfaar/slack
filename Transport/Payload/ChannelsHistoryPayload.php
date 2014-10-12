<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

use Symfony\Component\OptionsResolver\Options;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *         
 * @see Official documentation at https://api.slack.com/methods/channels.history
 */
class ChannelsHistoryPayload extends AbstractPayload
{
    /**
     * @param string $channelId
     */
    public function setChannelId($channelId)
    {
        $this->options['channel'] = $channelId;
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->options['channel'];
    }

    /**
     * @param float|string|null $latest
     */
    public function setLatest($latest = null)
    {
        $this->options['latest'] = $latest;
    }

    /**
     * @return float|string|null
     */
    public function getLatest()
    {
        return $this->options['latest'];
    }

    /**
     * @param float|null $oldest
     */
    public function setOldest($oldest = null)
    {
        $this->options['oldest'] = $oldest;
    }

    /**
     * @return float|null
     */
    public function getOldest()
    {
        return $this->options['oldest'];
    }

    /**
     * @param int|null $count
     */
    public function setCount($count = null)
    {
        $this->options['count'] = $count;
    }

    /**
     * @return int|null
     */
    public function getCount()
    {
        return $this->options['count'];
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'channels.history';
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return '\CL\Slack\Transport\Payload\Response\ChannelsHistoryPayloadResponse';
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequired()
    {
        return [
            'channel',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptional()
    {
        return [
            'latest',
            'oldest',
            'count',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getAllowedTypes()
    {
        return [
            'channel' => ['string'],
            'latest'  => ['string', 'float', 'null'],
            'oldest'  => ['float', 'null'],
            'count'   => ['integer', 'null'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getNormalizers()
    {
        return [
            'channel' => function (Options $options, $value) {
                if (substr($value, 0, 1) === '#') {
                    throw new \InvalidArgumentException(sprintf(
                        'Since channels can change names, Slack can only show you history if you supply the actual ID' .
                        'of the channel like "C12345", and not the name like "%s"',
                        $value
                    ));
                }

                return $value;
            },
        ];
    }
}
