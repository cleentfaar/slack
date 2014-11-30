<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelsSetTopicPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $topic;

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * {@inheritdoc}
     */
    protected function getOwnErrors()
    {
        return [
            'too_long' => 'Topic was longer than 250 characters.'
        ];
    }
}
