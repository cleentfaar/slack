<?php

/*
 * This user is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * user that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use JMS\Serializer\Annotation as Serializer;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @see Official documentation at https://api.slack.com/methods/users.info
 */
class UsersInfoPayload extends AbstractPayload
{
    /**
     * @var string $user ID of the user to get info on
     *
     * @Serializer\Type("string")
     */
    private $user;

    /**
     * @param string $user ID of the user to get info on
     */
    public function setUserId($user)
    {
        $this->user = $user;
    }

    /**
     * @return string ID of the user to get info on
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
        return 'users.info';
    }
}
