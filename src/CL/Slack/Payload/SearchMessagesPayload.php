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
 * @link Official documentation at https://api.slack.com/methods/search.messages
 */
class SearchMessagesPayload extends AbstractSearchPayload
{
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'search.messages';
    }
}
