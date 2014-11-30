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

class AfterEvent extends Event
{
    /**
     * @var array
     */
    private $payloadResponseData;

    /**
     * @param array $payloadResponseData
     */
    public function __construct(array $payloadResponseData)
    {
        $this->payloadResponseData = $payloadResponseData;
    }

    /**
     * @return array
     */
    public function getPayloadResponseData()
    {
        return $this->payloadResponseData;
    }
}
