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
class ChatUpdatePayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $channel;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $ts;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $text;

    /**
     * @return string|null
     */
    public function getChannelId()
    {
        return $this->channel;
    }

    /**
     * @return float
     */
    public function getTimestamp()
    {
        return $this->ts;
    }

    /**
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inheritdoc}
     */
    protected function getOwnErrors()
    {
        return [
            'cant_update_message' => 'Authenticated user does not have permission to update this message',
            'edit_window_closed'  => 'The message cannot be edited due to the team message edit settings',
            'msg_too_long'        => 'Message text is too long',
            'no_text'             => 'No message text provided',
        ];
    }
}
