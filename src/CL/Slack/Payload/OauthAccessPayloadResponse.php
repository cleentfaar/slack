<?php

/*
 * This file is part of the Slack API library.
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
class OauthAccessPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $scope;

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPossibleErrors()
    {
        return array_merge(parent::getPossibleErrors(), [
            'invalid_client_id' => 'Value passed for client_id was invalid',
            'bad_client_secret' => 'Value passed for client_secret was invalid',
            'invalid_code' => 'Value passed for code was invalid',
            'bad_redirect_uri' => 'Value passed for redirect_uri did not match the redirect_uri in the original request',
        ]);
    }
}
