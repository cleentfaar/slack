<?php

/*
 * This user is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * user that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 *
 * @link Unofficial documentation at https://levels.io/slack-typeform-auto-invite-sign-ups/
 */
class UsersAdminInvitePayload extends AbstractPayload
{
    /**
     * @var string
     */
    private $email;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'users.admin.invite';
    }
}
