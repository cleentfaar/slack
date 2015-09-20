<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Events;

use Symfony\Component\EventDispatcher\Event;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ResponseEvent extends Event
{
    /**
     * @var array
     */
    private $rawPayloadResponse;

    /**
     * @param array $rawPayloadResponse
     */
    public function __construct(array $rawPayloadResponse)
    {
        $this->rawPayloadResponse = $rawPayloadResponse;
    }

    /**
     * @return array
     */
    public function getRawPayloadResponse()
    {
        return $this->rawPayloadResponse;
    }
}
