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
 * @see Official documentation at https://api.slack.com/methods/channels.info
 */
class ChannelsInfoPayload extends AbstractPayload
{
    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return '\CL\Slack\Transport\Payload\Response\ChannelsInfoPayloadResponse';
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'channels.info';
    }

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
    protected function getAllowedTypes()
    {
        return [
            'channel' => ['string'],
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
                    // added check since this seems to confuse people
                    throw new \Exception(sprintf('Value for "channel" must be a channel ID, not a name (starting with hashsign)', $value));
                }

                return $value;
            },
        ];
    }
}
