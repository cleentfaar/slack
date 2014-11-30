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

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class PayloadResponseErrors
{
    const ACCOUNT_INACTIVE             = 'account_inactive';
    const ALREADY_ARCHIVED             = 'already_archived';
    const ALREADY_IN_CHANNEL           = 'already_in_channel';
    const AUTHENTICATION_INVALID_TOKEN = 'invalid_auth';
    const CANT_ARCHIVE_GENERAL         = 'cant_archive_general';
    const CANT_INVITE                  = 'cant_invite';
    const CANT_INVITE_SELF             = 'cant_invite_self';
    const CANT_KICK_FROM_GENERAL       = 'cant_kick_from_general';
    const CANT_KICK_FROM_LAST_CHANNEL  = 'cant_kick_from_last_channel';
    const CANT_KICK_SELF               = 'cant_kick_self';
    const CHANNEL_NOT_FOUND            = 'channel_not_found';
    const INVALID_AUTHENTICATION_TOKEN = 'invalid_auth';
    const IS_ARCHIVED                  = 'is_archived';
    const LAST_RA_CHANNEL              = 'last_ra_channel';
    const NAME_TAKEN                   = 'name_taken';
    const NO_CHANNEL                   = 'no_channel';
    const NOT_AUTHENTICATED            = 'not_authed';
    const NOT_IN_CHANNEL               = 'not_in_channel';
    const RESTRICTED_ACTION            = 'restricted_action';
    const USER_IS_ULTRA_RESTRICTED     = 'user_is_ultra_restricted';
    const USER_NOT_FOUND               = 'user_not_found';
    const RATE_LIMITED                 = 'rate_limited';

    /**
     * @param string $errorCode
     *
     * @return string
     */
    public static function explain($errorCode)
    {
        switch ($errorCode) {
            case self::ACCOUNT_INACTIVE:
                return 'Authentication token is for a deleted user or team';
            case self::ALREADY_ARCHIVED:
                return 'Channel has already been archived';
            case self::ALREADY_IN_CHANNEL:
                return 'Invited user is already in the channel';
            case self::AUTHENTICATION_INVALID_TOKEN:
                return 'Invalid token supplied';
            case self::CANT_ARCHIVE_GENERAL:
                return 'You cannot archive the general channel';
            case self::CANT_KICK_FROM_LAST_CHANNEL:
                return 'User cannot be removed from the last channel they\'re in';
            case self::CANT_KICK_SELF:
                return 'Authenticated user can\'t kick themselves from a channel';
            case self::CANT_INVITE:
                return 'User cannot be invited to this channel';
            case self::CANT_INVITE_SELF:
                return 'Authenticated user cannot invite themselves to a channel';
            case self::CANT_KICK_FROM_GENERAL:
                return 'User cannot be removed from #general';
            case self::CHANNEL_NOT_FOUND:
                return 'Channel could not be found';
            case self::INVALID_AUTHENTICATION_TOKEN:
                return 'Invalid authentication token';
            case self::IS_ARCHIVED:
                return 'Channel has been archived';
            case self::LAST_RA_CHANNEL:
                return 'You cannot archive the last channel for a restricted account';
            case self::NAME_TAKEN:
                return 'A channel cannot be created with the given name';
            case self::NO_CHANNEL:
                // official explanation is not very clear:
                // return 'Value passed for user was invalid';
                return 'A value passed for name was empty';
            case self::NOT_AUTHENTICATED:
                return 'No authentication token provided';
            case self::NOT_IN_CHANNEL:
                return 'User was not in the channel';
            case self::RATE_LIMITED:
                return 'Application has posted too many messages, read the Rate Limit documentation (https://api.slack.com/docs/rate-limits) for more information';
            case self::RESTRICTED_ACTION:
                return 'A team preference prevents authenticated user from archiving';
            case self::USER_IS_ULTRA_RESTRICTED:
                return 'This method cannot be called by a single channel guest';
            case self::USER_NOT_FOUND:
                // official explanation is not very clear:
                // return 'Value passed for user was invalid';
                return 'User could not be found';
            default:
                return sprintf('Unknown error: "%s"', $errorCode);
        }
    }
}
