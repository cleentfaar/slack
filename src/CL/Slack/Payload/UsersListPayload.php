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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/methods/users.list
 */
class UsersListPayload extends AbstractPayload
{
    /**
     * @var bool
     */
    private $presence;

    /**
     * @param bool $presence Whether to include presence data in the output
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;
    }

    /**
     * @return bool Whether to include presence data in the output
     */
    public function isPresence()
    {
        return $this->presence;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'users.list';
    }
}
