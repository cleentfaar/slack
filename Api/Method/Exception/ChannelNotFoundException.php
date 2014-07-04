<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Exception;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ChannelNotFoundException extends \Exception
{
    /**
     * @param string     $channel
     * @param int        $code
     * @param \Exception $previous
     */
    public function __construct($channel, $code = 0, \Exception $previous = null)
    {
        parent::__construct(sprintf('The given channel does not exist in your Slack instance: %s', $channel), $code, $previous);
    }
}
