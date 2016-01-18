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
 * @author Nic Malan <nicmalan@gmail.com>
 *
 * @link Official documentation at https://api.slack.com/methods/team.info
 */
class TeamInfoPayload extends AbstractPayload
{
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'team.info';
    }
}
