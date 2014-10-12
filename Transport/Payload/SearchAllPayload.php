<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 *         
 * @see Official documentation at https://api.slack.com/methods/search.all
 */
class SearchAllPayload extends AbstractSearchPayload
{
    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return '\CL\Slack\Transport\Payload\Response\SearchAllPayloadResponse';
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'search.all';
    }
}
