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

use CL\Slack\Payload\PayloadResponseInterface;
use CL\Slack\Serializer\PayloadResponseSerializer;
use CL\Slack\Test\Model\ModelTrait;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractPayloadResponseTestCase extends \PHPUnit_Framework_TestCase
{
    use ModelTrait;

    /**
     * @var PayloadResponseSerializer
     */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = new PayloadResponseSerializer();
    }

    /**
     * @test
     */
    public function it_can_be_deserialized()
    {
        $responseData = array_merge(['ok' => true], $this->createResponseData());

        /** @var PayloadResponseInterface $actualPayloadResponse */
        $actualPayloadResponse = $this->serializer->deserialize(
            $responseData,
            $this->getResponseClass()
        );

        $this->assertInstanceOf('CL\Slack\Payload\PayloadResponseInterface', $actualPayloadResponse);
        $this->assertInstanceOf($this->getResponseClass(), $actualPayloadResponse);
        $this->assertTrue($actualPayloadResponse->isOk());
        $this->assertResponse($responseData, $actualPayloadResponse);
    }

    /**
     * @test
     */
    public function it_can_explain_every_error()
    {
        foreach ($this->getErrorExplanations() as $errorCode => $explanation) {
            $responseData = ['ok' => false, 'error' => $errorCode];

            /** @var PayloadResponseInterface $actualPayloadResponse */
            $actualPayloadResponse = $this->serializer->deserialize(
                $responseData,
                $this->getResponseClass()
            );

            $this->assertSame($explanation, $actualPayloadResponse->getErrorExplanation());
        }
    }

    /**
     * Returns the response class used for this test-case
     * Can be overwritten if it deviates from the standard pattern.
     * 
     * @return string
     */
    protected function getResponseClass()
    {
        $class = get_class($this);
        $name = substr($class, strripos($class, '\\') + 1, -4);

        return sprintf('CL\Slack\Payload\%s', $name);
    }

    /**
     * @return array
     */
    protected function getErrorExplanations()
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

    /**
     * Compares the expected response data against the values returned by the actual Response's methods.
     *
     * @param array                    $responseData
     * @param PayloadResponseInterface $payloadResponse
     */
    abstract protected function assertResponse(array $responseData, PayloadResponseInterface $payloadResponse);

    /**
     * Returns the data used for comparison against the actual Response class.
     *
     * @return array
     */
    abstract public function createResponseData();
}
