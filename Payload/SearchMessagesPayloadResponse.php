<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Payload;

use CL\Slack\Model\MessageSearchResult;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchMessagesPayloadResponse extends AbstractSearchPayloadResponse
{
    /**
     * @var MessageSearchResult
     *
     * @Serializer\Type("CL\Slack\Model\MessageSearchResult")
     */
    private $messages;

    /**
     * @return MessageSearchResult
     */
    public function getMessageSearchResult()
    {
        return $this->messages;
    }
}
