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
 * @author Travis Raup <info@travisraup.com>
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
