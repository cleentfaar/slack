<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Util;

use CL\Slack\Payload;
use CL\Slack\Payload\PayloadInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class PayloadRegistry
{
    /**
     * @var PayloadInterface[]
     */
    private $payloads = [];

    public function __construct()
    {
        $this->registerDefaults();
    }

    /**
     * @param PayloadInterface $payload
     *
     * @throws \InvalidArgumentException If the given payload's method has already been registered
     */
    public function register(PayloadInterface $payload)
    {
        if (array_key_exists($payload->getMethod(), $this->payloads)) {
            throw new \InvalidArgumentException(sprintf(
                'Already registered a payload for this method: %s',
                $payload->getMethod()
            ));
        }

        $this->payloads[$payload->getMethod()] = $payload;
    }

    /**
     * @param string $method
     *
     * @return bool
     */
    public function has($method)
    {
        return array_key_exists($method, $this->payloads);
    }

    /**
     * @param string $method
     *
     * @return PayloadInterface
     */
    public function get($method)
    {
        if (!array_key_exists($method, $this->payloads)) {
            if (!empty($this->payloads)) {
                throw new \InvalidArgumentException(sprintf(
                    'There is no payload available for that method (%s), available methods are: %s',
                    $method,
                    implode(', ', array_keys($this->payloads))
                ));
            }
            
            throw new \InvalidArgumentException(sprintf(
                'There is no payload available for that method (%s)',
                $method
            ));
        }

        return $this->payloads[$method];
    }

    private function registerDefaults()
    {
        $payloads = [
            new Payload\AuthTestPayload(),
            new Payload\ApiTestPayload(),
            new Payload\ChannelsArchivePayload(),
            new Payload\ChannelsCreatePayload(),
            new Payload\ChannelsHistoryPayload(),
            new Payload\ChannelsInfoPayload(),
            new Payload\ChannelsInvitePayload(),
            new Payload\ChannelsJoinPayload(),
            new Payload\ChannelsKickPayload(),
            new Payload\ChannelsLeavePayload(),
            new Payload\ChannelsListPayload(),
            new Payload\ChannelsMarkPayload(),
            new Payload\ChannelsRenamePayload(),
            new Payload\ChannelsSetPurposePayload(),
            new Payload\ChannelsSetTopicPayload(),
            new Payload\ChannelsUnarchivePayload(),
            new Payload\ChatDeletePayload(),
            new Payload\ChatPostMessagePayload(),
            new Payload\ChatUpdatePayload(),
            new Payload\EmojiListPayload(),
            new Payload\FilesInfoPayload(),
            new Payload\FilesListPayload(),
            new Payload\FilesUploadPayload(),
            new Payload\GroupsArchivePayload(),
            new Payload\GroupsClosePayload(),
            new Payload\GroupsCreateChildPayload(),
            new Payload\GroupsCreatePayload(),
            new Payload\GroupsHistoryPayload(),
            new Payload\GroupsInvitePayload(),
            new Payload\GroupsKickPayload(),
            new Payload\GroupsLeavePayload(),
            new Payload\GroupsListPayload(),
            new Payload\GroupsMarkPayload(),
            new Payload\GroupsOpenPayload(),
            new Payload\GroupsRenamePayload(),
            new Payload\GroupsSetPurposePayload(),
            new Payload\GroupsSetTopicPayload(),
            new Payload\GroupsUnarchivePayload(),
            new Payload\ImClosePayload(),
            new Payload\ImHistoryPayload(),
            new Payload\ImListPayload(),
            new Payload\ImMarkPayload(),
            new Payload\ImOpenPayload(),
            new Payload\OauthAccessPayload(),
            new Payload\SearchAllPayload(),
            new Payload\SearchFilesPayload(),
            new Payload\SearchMessagesPayload(),
            new Payload\StarsListPayload(),
            new Payload\UsersInfoPayload(),
            new Payload\UsersListPayload(),
            new Payload\UsersSetActivePayload(),
            new Payload\UsersSetPresencePayload(),
        ];

        foreach ($payloads as $payload) {
            $this->register($payload);
        }
    }
}
