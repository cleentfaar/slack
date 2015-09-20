<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Payload;

use CL\Slack\Payload\OauthAccessPayload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class OauthAccessPayloadTest extends AbstractPayloadTest
{
    /**
     * {@inheritdoc}
     */
    protected function createPayload()
    {
        $payload = new OauthAccessPayload();

        $payload->setClientId('4b39e9-752c4');
        $payload->setClientSecret('33fea0113f5b1');
        $payload->setCode('ccdaa72ad');
        $payload->setRedirectUri('http://example.com');

        return $payload;
    }

    /**
     * {@inheritdoc}
     *
     * @param OauthAccessPayload $payload
     */
    protected function getExpectedPayloadData(PayloadInterface $payload)
    {
        return [
            'client_id' => $payload->getClientId(),
            'client_secret' => $payload->getClientSecret(),
            'code' => $payload->getCode(),
            'redirect_uri' => $payload->getRedirectUri(),
        ];
    }
}
