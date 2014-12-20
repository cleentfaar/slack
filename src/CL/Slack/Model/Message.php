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
class Message extends SimpleMessage
{
    /**
     * @var Channel|null
     *
     * @Serializer\Type("CL\Slack\Model\Channel")
     */
    private $channel;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $permalink;

    /**
     * @var SimpleMessage|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleMessage")
     */
    private $previous;

    /**
     * @var SimpleMessage|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleMessage")
     */
    private $previous2;

    /**
     * @var SimpleMessage|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleMessage")
     */
    private $next;

    /**
     * @var SimpleMessage|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleMessage")
     */
    private $next2;

    /**
     * @var SimpleMessage|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleMessage")
     */
    private $next2Alt;

    /**
     * @return Channel|null
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @return SimpleMessage|null
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @return SimpleMessage|null
     */
    public function getNext2()
    {
        return $this->next2;
    }

    /**
     * @return SimpleMessage|null
     */
    public function getNext2Alt()
    {
        return $this->next2Alt;
    }

    /**
     * @return null|string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @return SimpleMessage|null
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @return SimpleMessage|null
     */
    public function getPrevious2()
    {
        return $this->previous2;
    }
}
