<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SimpleMessage extends AbstractModel
{
    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    protected $ts;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    protected $type;

    /**
     * @var SimpleChannel
     *
     * @Serializer\Type("CL\Slack\Model\SimpleChannel")
     */
    protected $channel;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    protected $user;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    protected $username;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    protected $text;

    /**
     * @return float|null The Slack timestamp on which the message was posted
     */
    public function getTimestamp()
    {
        return $this->ts;
    }

    /**
     * @return string The type of message
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return SimpleChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @return string|null The ID of the user that posted the message,
     *                     can be null if the message was made by Slack itself.
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * @return string|null The username belonging to the user that posted the message,
     *                     can be null if the message was made by Slack itself.
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string The actual text of the message.
     */
    public function getText()
    {
        return $this->text;
    }
}
