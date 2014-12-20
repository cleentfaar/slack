<?php

/*
 * This file is part of the Slack API library.
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
 *
 * @see Official documentation at https://api.slack.com/methods/im.open
 */
class ImOpenPayload extends AbstractPostPayload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $user;

    /**
     * @param string $userId ID of the user to open a direct message channel with
     */
    public function setUserId($userId)
    {
        $this->user = $userId;
    }

    /**
     * @return string ID of the user to open a direct message channel with
     */
    public function getUserId()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'im.open';
    }
}
