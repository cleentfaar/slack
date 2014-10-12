<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Transport\Payload\Response;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class PayloadResponseErrors
{
    const AUTHENTICATION_INVALID_TOKEN = 'invalid_auth';

    /**
     * @param string $errorCode
     *
     * @return string
     */
    public static function explain($errorCode)
    {
        switch ($errorCode) {
            case static::AUTHENTICATION_INVALID_TOKEN:
                return 'Invalid token supplied';
            default:
                return sprintf('Unknown error: "%s"', $errorCode);
        }
    }
}
