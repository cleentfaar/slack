<?php

namespace CL\Slack\Payload;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadResponse implements PayloadResponseInterface
{
    /**
     * @var bool
     */
    private $ok;

    /**
     * @var string
     */
    private $error;

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return (bool) $this->ok;
    }

    /**
     * {@inheritdoc}
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorExplanation()
    {
        if (null === $error = $this->getError()) {
            return;
        }

        $ownErrors = $this->getPossibleErrors();
        if (array_key_exists($error, $ownErrors)) {
            return $ownErrors[$error];
        }

        return sprintf('Unknown error (%s)', $error);
    }

    /**
     * @return array
     */
    protected function getPossibleErrors()
    {
        return [
            'account_inactive' => 'Authentication token is for a deleted user or team',
            'already_archived' => 'Channel has already been archived',
            'already_in_channel' => 'Invited user is already in the channel',
            'invalid_auth' => 'Invalid authentication token',
            'invalid_token' => 'Invalid token supplied',
            'cant_archive_general' => 'You cannot archive the general channel',
            'cant_invite' => 'User cannot be invited to this channel',
            'cant_invite_self' => 'Authenticated user cannot invite themselves to a channel',
            'cant_kick_from_general' => 'User cannot be removed from #general',
            'cant_kick_from_last_channel' => 'User cannot be removed from the last channel they\'re in',
            'cant_kick_self' => 'Authenticated user can\'t kick themselves from a channel',
            'channel_not_found' => 'Channel could not be found',
            'is_archived' => 'Channel has been archived',
            'last_ra_channel' => 'You cannot archive the last channel for a restricted account',
            'name_taken' => 'A channel cannot be created with the given name',
            'no_channel' => 'A value passed for name was empty',
            'not_authed' => 'No authentication token provided',
            'not_in_channel' => 'User was not in the channel',
            'rate_limited' => 'Application has posted too many messages, read the Rate Limit documentation (https://api.slack.com/docs/rate-limits) for more information',
            'restricted_action' => 'A team preference prevents authenticated user from archiving',
            'user_is_bot' => 'This method cannot be called by a bot user',
            'user_is_ultra_restricted' => 'This method cannot be called by a single channel guest',
            'user_not_found' => 'User could not be found',
        ];
    }
}
