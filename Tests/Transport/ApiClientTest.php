<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests\Transport;

use CL\Slack\Payload\ApiTestPayload;
use CL\Slack\Payload\AuthTestPayload;
use CL\Slack\Payload\ChannelsArchivePayload;
use CL\Slack\Payload\ChannelsCreatePayload;
use CL\Slack\Payload\ChannelsHistoryPayload;
use CL\Slack\Payload\ChannelsInfoPayload;
use CL\Slack\Payload\ChannelsInvitePayload;
use CL\Slack\Payload\ChannelsJoinPayload;
use CL\Slack\Payload\ChannelsKickPayload;
use CL\Slack\Payload\ChannelsLeavePayload;
use CL\Slack\Payload\ChannelsListPayload;
use CL\Slack\Payload\ChannelsMarkPayload;
use CL\Slack\Payload\ChannelsRenamePayload;
use CL\Slack\Payload\ChannelsSetPurposePayload;
use CL\Slack\Payload\ChannelsSetTopicPayload;
use CL\Slack\Payload\ChannelsUnarchivePayload;
use CL\Slack\Payload\ChatDeletePayload;
use CL\Slack\Payload\ChatPostMessagePayload;
use CL\Slack\Payload\ChatUpdatePayload;
use CL\Slack\Payload\EmojiListPayload;
use CL\Slack\Payload\FilesInfoPayload;
use CL\Slack\Payload\FilesListPayload;
use CL\Slack\Payload\FilesUploadPayload;
use CL\Slack\Payload\GroupsArchivePayload;
use CL\Slack\Payload\GroupsClosePayload;
use CL\Slack\Payload\GroupsCreateChildPayload;
use CL\Slack\Payload\GroupsCreatePayload;
use CL\Slack\Payload\GroupsHistoryPayload;
use CL\Slack\Payload\GroupsInvitePayload;
use CL\Slack\Payload\GroupsKickPayload;
use CL\Slack\Payload\GroupsLeavePayload;
use CL\Slack\Payload\GroupsListPayload;
use CL\Slack\Payload\GroupsMarkPayload;
use CL\Slack\Payload\GroupsOpenPayload;
use CL\Slack\Payload\GroupsRenamePayload;
use CL\Slack\Payload\GroupsSetPurposePayload;
use CL\Slack\Payload\GroupsSetTopicPayload;
use CL\Slack\Payload\GroupsUnarchivePayload;
use CL\Slack\Payload\ImClosePayload;
use CL\Slack\Payload\ImHistoryPayload;
use CL\Slack\Payload\ImListPayload;
use CL\Slack\Payload\ImMarkPayload;
use CL\Slack\Payload\ImOpenPayload;
use CL\Slack\Payload\OauthAccessPayload;
use CL\Slack\Payload\PayloadInterface;
use CL\Slack\Payload\PresenceSetPayload;
use CL\Slack\Payload\SearchAllPayload;
use CL\Slack\Payload\SearchFilesPayload;
use CL\Slack\Payload\SearchMessagesPayload;
use CL\Slack\Payload\UsersListPayload;
use CL\Slack\Tests\AbstractTestCase;
use CL\Slack\Tests\Payload\MockPayload;
use CL\Slack\Transport\ApiClient;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Post\PostBody;
use GuzzleHttp\Subscriber\History;
use GuzzleHttp\Subscriber\Mock;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiClientTest extends AbstractTestCase
{
    const TOKEN = 'fake-token';

    /**
     * @var PayloadInterface[]
     */
    protected $payloads = [];

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->payloads = [
            new ApiTestPayload(),
            new AuthTestPayload(),
            new ChannelsArchivePayload(),
            new ChannelsCreatePayload(),
            new ChannelsHistoryPayload(),
            new ChannelsInfoPayload(),
            new ChannelsInvitePayload(),
            new ChannelsJoinPayload(),
            new ChannelsKickPayload(),
            new ChannelsLeavePayload(),
            new ChannelsListPayload(),
            new ChannelsMarkPayload(),
            new ChannelsRenamePayload(),
            new ChannelsSetPurposePayload(),
            new ChannelsSetTopicPayload(),
            new ChannelsUnarchivePayload(),
            new ChatDeletePayload(),
            new ChatPostMessagePayload(),
            new ChatUpdatePayload(),
            new EmojiListPayload(),
            new FilesInfoPayload(),
            new FilesListPayload(),
            new FilesUploadPayload(),
            new GroupsArchivePayload(),
            new GroupsClosePayload(),
            new GroupsCreatePayload(),
            new GroupsCreateChildPayload(),
            new GroupsHistoryPayload(),
            new GroupsInvitePayload(),
            new GroupsKickPayload(),
            new GroupsLeavePayload(),
            new GroupsListPayload(),
            new GroupsMarkPayload(),
            new GroupsOpenPayload(),
            new GroupsRenamePayload(),
            new GroupsSetPurposePayload(),
            new GroupsSetTopicPayload(),
            new GroupsUnarchivePayload(),
            new ImClosePayload(),
            new ImHistoryPayload(),
            new ImListPayload(),
            new ImMarkPayload(),
            new ImOpenPayload(),
            new OauthAccessPayload(),
            new PresenceSetPayload(),
            new SearchAllPayload(),
            new SearchFilesPayload(),
            new SearchMessagesPayload(),
            new UsersListPayload(),
        ];

        $this->serializer = SerializerBuilder::create()->build();
        $this->apiClient  = new ApiClient(self::TOKEN, $this->serializer, new Client());
    }

    public function testSend()
    {
        foreach ($this->payloads as $payload) {

        }

        $this->assertInstanceOf($mockPayload->getResponseClass(), $response);
        $this->assertEquals($mockData, json_decode($history->getLastRequest()->getBody()->getContents(), true));
        $this->assertEquals('https://slack.com/api/mock', $history->getLastRequest()->getUrl());
    }

    public function testEventDispatcher()
    {
        $apiClient = new ApiClient(self::TOKEN, $this->serializer, new Client());

        $this->assertInstanceOf(
            'Symfony\Component\EventDispatcher\EventDispatcherInterface',
            $apiClient->getEventDispatcher()
        );
    }
}
