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
class RequestEvent extends Event
{
    /**
     * @var array
     */
    private $rawPayload;

    /**
     * @param array $rawPayload
     */
    public function __construct(array $rawPayload)
    {
        $this->rawPayload = $rawPayload;
    }

    /**
     * @return array
     */
    public function getRawPayload()
    {
        return $this->rawPayload;
    }
}
