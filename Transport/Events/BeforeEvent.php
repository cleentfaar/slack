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

class BeforeEvent extends Event
{
    /**
     * @var array
     */
    private $payloadData;

    /**
     * @param array $payloadData
     */
    public function __construct(array $payloadData)
    {
        $this->payloadData = $payloadData;
    }

    /**
     * @return array
     */
    public function getPayloadData()
    {
        return $this->payloadData;
    }
}
