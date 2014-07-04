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
class InvalidTokenException extends \Exception
{
    /**
     * @param string     $token
     * @param int        $code
     * @param \Exception $previous
     */
    public function __construct($token, $code = 0, \Exception $previous = null)
    {
        parent::__construct(sprintf('The given token is not valid: %s', $token), $code, $previous);
    }
}
