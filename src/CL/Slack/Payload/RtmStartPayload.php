<?php

/*
 * This user is part of the Slack API library.
 *
 * (c) Travis Raup <info@travisraup.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * user that was distributed with this source code.
 */

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *
 * @link Official documentation at https://api.slack.com/methods/rtm.start
 */
class RtmStartPayload extends AbstractPayload
{

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'rtm.start';
    }
}
