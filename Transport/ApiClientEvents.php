<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport;

abstract class ApiClientEvents
{
    const EVENT_BEFORE = 'EVENT_BEFORE';
    const EVENT_AFTER  = 'EVENT_AFTER';
}
