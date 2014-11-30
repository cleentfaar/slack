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

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessage extends Message
{
    /**
     * @var SimpleChannel|null
     *
     * @Serializer\Type("CL\Slack\Model\SimpleChannel")
     */
    private $channel;

    /**
     * @return SimpleChannel|null The channel object on which the message was posted
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
