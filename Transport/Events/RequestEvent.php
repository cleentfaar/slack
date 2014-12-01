<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Events;

use Symfony\Component\EventDispatcher\Event;

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
        $this->payloadData = $rawPayload;
    }

    /**
     * @return array
     */
    public function getRawPayload()
    {
        return $this->rawPayload;
    }
}
