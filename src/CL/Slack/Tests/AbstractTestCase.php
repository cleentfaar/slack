<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Tests;

use CL\Slack\Model\Channel;
use CL\Slack\Model\Customizable;
use CL\Slack\Model\File;
use CL\Slack\Model\FileResultItem;
use CL\Slack\Model\Group;
use CL\Slack\Model\GroupWithState;
use CL\Slack\Model\ImChannel;
use CL\Slack\Model\MessageResultItem;
use CL\Slack\Model\Paging;
use CL\Slack\Model\SimpleChannel;
use CL\Slack\Model\SimpleMessage;
use CL\Slack\Model\StarredItem;
use CL\Slack\Model\User;
use CL\Slack\Model\UserProfile;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $expected
     * @param File  $actual
     */
    protected function assertFile(array $expected, File $actual)
    {
        $this->assertNotEmpty($expected);
        $this->assertInstanceOf('CL\Slack\Model\File', $actual);
        $this->assertEquals($expected, [
            'id'                   => $actual->getId(),
            'timestamp'            => $actual->getTimestamp()->format('U'),
            'name'                 => $actual->getName(),
            'channels'             => $actual->getChannels(),
            'editable'             => $actual->isEditable(),
            'edit_link'            => $actual->getEditLink(),
            'external_type'        => $actual->getExternalType(),
            'filetype'             => $actual->getFileType(),
            'groups'               => $actual->getGroups(),
            'initial_comment'      => $actual->getInitialComment(),
            'is_external'          => $actual->isExternal(),
            'is_public'            => $actual->isPublic(),
            'lines'                => $actual->getLines(),
            'lines_more'           => $actual->getLinesMore(),
            'mimetype'             => $actual->getMimeType(),
            'mode'                 => $actual->getMode(),
            'num_stars'            => $actual->getNumStars(),
            'permalink'            => $actual->getPermalink(),
            'pretty_type'          => $actual->getPrettyType(),
            'preview'              => $actual->getPreview(),
            'preview_highlight'    => $actual->getPreviewHighlight(),
            'public_url_shared'    => $actual->isPublicUrlShared(),
            'size'                 => $actual->getSize(),
            'created'              => $actual->getCreated()->format('U'),
            'title'                => $actual->getTitle(),
            'user'                 => $actual->getUserId(),
            'url'                  => $actual->getUrl(),
            'url_download'         => $actual->getUrlDownload(),
            'url_private'          => $actual->getUrlPrivate(),
            'url_private_download' => $actual->getUrlPrivateDownload(),

            'thumb_64'             => $actual->getThumb64(),
            'thumb_80'             => $actual->getThumb80(),
            'thumb_360'            => $actual->getThumb360(),
            'thumb_360_gif'        => $actual->getThumb360Gif(),
            'thumb_360_w'          => $actual->getThumb360W(),
            'thumb_360_h'          => $actual->getThumb360H(),

            'is_starred'           => $actual->isStarred(),
        ]);
    }

    /**
     * @param array         $expected
     * @param SimpleMessage $actual
     */
    protected function assertMessage(array $expected, SimpleMessage $actual)
    {
        $this->assertEquals($expected, [
            'channel'  => [
                'id'   => $actual->getChannel()->getId(),
                'name' => $actual->getChannel()->getName(),
            ],
            'ts'       => $actual->getTimestamp(),
            'type'     => $actual->getType(),
            'text'     => $actual->getText(),
            'user'     => $actual->getUserId(),
            'username' => $actual->getUsername(),
        ]);
    }

    /**
     * @param array        $expected
     * @param Customizable $actual
     */
    protected function assertCustomizable(array $expected, Customizable $actual)
    {
        $this->assertEquals($expected, [
            'value'    => $actual->getValue(),
            'type'     => $actual->getType(),
            'creator'  => $actual->getCreator(),
            'last_set' => $actual->getLastSet()->format('U'),
        ]);
    }

    /**
     * @param array         $expected
     * @param SimpleChannel $actual
     */
    protected function assertSimpleChannel(array $expected, SimpleChannel $actual)
    {
        $this->assertEquals($expected, [
            'id'      => $actual->getId(),
            'created' => $actual->getCreated()->format('U'),
            'creator' => $actual->getCreator(),
            'name'    => $actual->getName(),
        ]);
    }

    /**
     * @param array   $expected
     * @param Channel $actual
     */
    protected function assertChannel(array $expected, Channel $actual)
    {
        $this->assertMessage($expected['latest'], $actual->getLatest());
        $this->assertCustomizable($expected['purpose'], $actual->getPurpose());
        $this->assertCustomizable($expected['topic'], $actual->getTopic());
        $this->assertInstanceOf('\DateTime', $actual->getCreated());
        unset($expected['latest']);
        unset($expected['purpose']);
        unset($expected['topic']);
        $this->assertEquals($expected, [
            'id'        => $actual->getId(),
            'created'   => $actual->getCreated()->format('U'),
            'creator'   => $actual->getCreator(),
            'last_read' => $actual->getLastRead(),
            'members'   => $actual->getMembers(),
            'name'      => $actual->getName(),
        ]);
    }

    /**
     * @param array $expected
     * @param Group $actual
     */
    protected function assertGroup(array $expected, Group $actual)
    {
        $this->assertMessage($expected['latest'], $actual->getLatest());
        $this->assertCustomizable($expected['purpose'], $actual->getPurpose());
        $this->assertCustomizable($expected['topic'], $actual->getTopic());
        $this->assertInstanceOf('\DateTime', $actual->getCreated());
        unset($expected['latest']);
        unset($expected['purpose']);
        unset($expected['topic']);
        $this->assertEquals($expected, [
            'id'                   => $actual->getId(),
            'created'              => $actual->getCreated()->format('U'),
            'creator'              => $actual->getCreator(),
            'last_read'            => '' . $actual->getLastRead(),
            'members'              => $actual->getMembers(),
            'name'                 => $actual->getName(),
            'is_group'             => $actual->isGroup(),
            'is_archived'          => $actual->isArchived(),
            'unread_count'         => $actual->getUnreadCount(),
            'unread_count_display' => $actual->getUnreadCountDisplay(),
        ]);
    }

    /**
     * @param array          $expected
     * @param GroupWithState $actual
     */
    protected function assertGroupWithState(array $expected, GroupWithState $actual)
    {
        $this->assertEquals($expected['is_open'], $actual->isOpen());
        unset($expected['is_open']);
        $this->assertGroup($expected, $actual);
    }

    /**
     * @param array          $expectedFileResultItem
     * @param FileResultItem $fileResultItem
     */
    protected function assertFileResultItem(array $expectedFileResultItem, FileResultItem $fileResultItem)
    {
        $this->assertEquals($expectedFileResultItem['channel']['id'], $fileResultItem->getChannel()->getId());
        unset($expectedFileResultItem['channel']);
        $this->assertFile($expectedFileResultItem, $fileResultItem);
    }

    /**
     * @param array             $expected
     * @param MessageResultItem $actual
     */
    protected function assertMessageResultItem(array $expected, MessageResultItem $actual)
    {
        $this->assertMessage($expected, $actual);
    }

    /**
     * @param array  $expected
     * @param Paging $actual
     */
    protected function assertPaging(array $expected, Paging $actual)
    {
        $this->assertEquals($expected, [
            'count' => $actual->getCount(),
            'total' => $actual->getTotal(),
            'page'  => $actual->getPage(),
            'pages' => $actual->getPages(),
        ]);
    }

    /**
     * @param array       $expected
     * @param StarredItem $actual
     */
    protected function assertStarredItem(array $expected, StarredItem $actual)
    {
        $this->assertFile($expected['file'], $actual->getFile());
        unset($expected['file']);

        $this->assertEquals($expected, [
            'type'    => $actual->getType(),
            'comment' => $actual->getComment(),
        ]);
    }

    protected function createPaging()
    {
        return [
            'total' => 123,
            'count' => 123,
            'page'  => 123,
            'pages' => 123,
        ];
    }

    protected function createFileResult()
    {
        return [
            'matches' => [
                $this->createFileResultItem(),
            ],
            'paging'  => $this->createPaging(),
        ];
    }

    protected function createMessageResult()
    {
        return [
            'matches' => [
                $this->createMessageResultItem(),
            ],
            'paging'  => $this->createPaging(),
        ];
    }

    protected function createStarredItem()
    {
        return [
            'type'    => 'file_comment',
            'file'    => $this->createFile(),
            'comment' => 'a comment',
            // @todo Create comment model?
            //'comment' => $this->createComment(),
        ];
    }

    /**
     * Returns an example of file-data that could be returned by a response
     * Used by different tests to simplify their fixtures
     *
     * @return array
     */
    protected function createFile()
    {
        return [
            'id'                   => 'F2147483862',
            'created'              => '1356032811',
            'timestamp'            => '1356032811',

            'name'                 => 'file.htm',
            'title'                => 'My HTML file',
            'mimetype'             => 'text/plain',
            'filetype'             => 'text',
            'pretty_type'          => 'Text',
            'user'                 => 'U2147483697',

            'mode'                 => 'hosted',
            'editable'             => true,
            'is_external'          => false,
            'external_type'        => '',

            'size'                 => '12345',

            'url'                  => 'https =>//slack-files.com/files-pub/T024BE7LD-F024BERPE-09acb6/1.png',
            'url_download'         => 'https =>//slack-files.com/files-pub/T024BE7LD-F024BERPE-09acb6/download/1.png',
            'url_private'          => 'https =>//slack.com/files-pri/T024BE7LD-F024BERPE/1.png',
            'url_private_download' => 'https =>//slack.com/files-pri/T024BE7LD-F024BERPE/download/1.png',

            'thumb_64'             => 'https =>//slack-files.com/files-tmb/T024BE7LD-F024BERPE-c66246/1_64.png',
            'thumb_80'             => 'https =>//slack-files.com/files-tmb/T024BE7LD-F024BERPE-c66246/1_80.png',
            'thumb_360'            => 'https =>//slack-files.com/files-tmb/T024BE7LD-F024BERPE-c66246/1_360.png',
            'thumb_360_gif'        => 'https =>//slack-files.com/files-tmb/T024BE7LD-F024BERPE-c66246/1_360.gif',
            'thumb_360_w'          => '100',
            'thumb_360_h'          => '100',

            'permalink'            => 'https =>//tinyspeck.slack.com/files/cal/F024BERPE/1.png',
            'edit_link'            => 'https =>//tinyspeck.slack.com/files/cal/F024BERPE/1.png/edit',
            'preview'              => '&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n&lt;meta charset="utf-8"&gt;',
            'preview_highlight'    => '&lt;div class=\'sssh-code\'&gt;&lt;div class=\'sssh-line\'&gt;&lt;pre&gt;&lt;!DOCTYPE html...',
            'lines'                => 123,
            'lines_more'           => 118,

            'is_public'            => true,
            'public_url_shared'    => false,
            'channels'             => ['C024BE7LT'],
            'groups'               => ['G12345'],
            'initial_comment'      => 'This is the comment',
            'num_stars'            => 7,
            'is_starred'           => true
        ];
    }

    /**
     * @param array         $expected
     * @param SimpleMessage $actual
     */
    protected function assertSimpleMessage(array $expected, SimpleMessage $actual)
    {
        $this->assertEquals($expected['type'], $actual->getType());
        $this->assertEquals($expected['ts'], $actual->getTimestamp());
        $this->assertEquals($expected['user'], $actual->getUserId());
        $this->assertEquals($expected['text'], $actual->getText());
        $this->assertEquals($expected['username'], $actual->getUsername());
    }

    /**
     * @return array
     */
    protected function createSimpleMessage()
    {
        return [
            'type'     => 'message',
            'ts'       => 1358546515.0,
            'user'     => 'U2147483896',
            'username' => 'acme user',
            'text'     => 'Hello',
        ];
    }

    /**
     * Returns an example of file-data that could be returned by a response
     * Used by different tests to simplify their fixtures
     *
     * @return array
     */
    protected function createMessage()
    {
        return [
            'channel'  => $this->createSimpleChannel(),
            'ts'       => 12345678.0,
            'type'     => 'message',
            'text'     => 'Hello world!',
            'user'     => 'U1234567',
            'username' => 'Acme',
        ];
    }

    /**
     * Returns an example of channel-data that could be returned by a response
     * Used by different tests to simplify their fixtures
     *
     * @return array
     */
    protected function createSimpleChannel()
    {
        return [
            'id'   => 'C1234567',
            'name' => '#foo',
        ];
    }

    /**
     * @param array $expected
     * @param User  $actual
     */
    protected function assertUser(array $expected, User $actual)
    {
        $this->assertUserProfile($expected['profile'], $actual->getProfile());
        unset($expected['profile']);

        $this->assertEquals($expected, [
            'id'                  => $actual->getId(),
            'name'                => $actual->getName(),
            'color'               => $actual->getColor(),
            'is_admin'            => $actual->isAdmin(),
            'is_bot'              => $actual->isBot(),
            'is_restricted'       => $actual->isRestricted(),
            'is_ultra_restricted' => $actual->isUltraRestricted(),
            'deleted'             => $actual->isDeleted(),
            'has_files'           => $actual->hasFiles(),
        ]);
    }

    /**
     * @return array
     */
    protected function createUser()
    {
        return [
            'id'                  => 'U1234567',
            'name'                => 'Acme User',
            'color'               => 'blue',
            'profile'             => $this->createUserProfile(),
            'is_admin'            => true,
            'is_bot'              => false,
            'is_restricted'       => false,
            'is_ultra_restricted' => false,
            'deleted'             => false,
            'has_files'           => false,
        ];
    }

    /**
     * @param array       $expected
     * @param UserProfile $actual
     */
    protected function assertUserProfile(array $expected, UserProfile $actual)
    {
        $this->assertEquals($expected, [
            'first_name' => $actual->getFirstName(),
            'last_name'  => $actual->getLastName(),
            'real_name'  => $actual->getRealName(),
            'email'      => $actual->getEmail(),
            'skype'      => $actual->getSkype(),
            'phone'      => $actual->getPhone(),
            'image_24'   => $actual->getImage24(),
            'image_32'   => $actual->getImage32(),
            'image_48'   => $actual->getImage48(),
            'image_72'   => $actual->getImage72(),
            'image_192'  => $actual->getImage192(),
        ]);
    }

    protected function assertImChannel(array $expected, ImChannel $actual)
    {
        $this->assertEquals($expected, [
            'id'              => $actual->getId(),
            'is_im'           => $actual->isIm(),
            'is_user_deleted' => $actual->isUserDeleted(),
            'created'         => $actual->getCreated()->format('U'),
            'user'            => $actual->getUserId(),
        ]);
    }

    protected function createImChannel()
    {
        return [
            'id'              => 'D024BFF1M',
            'is_im'           => true,
            'user'            => 'USLACKBOT',
            'created'         => 1372105335,
            'is_user_deleted' => false,
        ];
    }

    /**
     * @return array
     */
    protected function createUserProfile()
    {
        return [
            'first_name' => 'Bobby',
            'last_name'  => 'Tables',
            'real_name'  => 'Bobby Tables',
            'email'      => 'bobby@slack.com',
            'skype'      => 'my-skype-name',
            'phone'      => '+1 (123) 456 7890',
            'image_24'   => 'https =>\/\/...',
            'image_32'   => 'https =>\/\/...',
            'image_48'   => 'https =>\/\/...',
            'image_72'   => 'https =>\/\/...',
            'image_192'  => 'https =>\/\/...'
        ];
    }

    /**
     * Returns an example of channel-data that could be returned by a response
     * Used by different tests to simplify their fixtures
     *
     * @return array
     */
    protected function createChannel()
    {
        return [
            'id'        => 'C1234567',
            'created'   => '12345678',
            'creator'   => 'U1234567',
            'last_read' => 12345678.0,
            'latest'    => $this->createMessage(),
            'members'   => [
                'U1234567'
            ],
            'name'      => 'acme_channel',
            'purpose'   => $this->createCustomizable(),
            'topic'     => $this->createCustomizable(),
        ];
    }

    protected function createGroup()
    {
        return [
            'id'                   => 'G024BE91L',
            'name'                 => 'secretplans',
            'is_group'             => true,
            'created'              => '1360782804',
            'creator'              => 'U024BE7LH',
            'is_archived'          => false,
            'members'              => [
                'U024BE7LH'
            ],
            'topic'                => $this->createCustomizable(),
            'purpose'              => $this->createCustomizable(),
            'last_read'            => '1401383885',
            'latest'               => $this->createMessage(),
            'unread_count'         => 0,
            'unread_count_display' => 0
        ];
    }

    protected function createGroupWithState()
    {
        return array_merge($this->createGroup(), [
            'is_open' => true,
        ]);
    }

    /**
     * @return array
     */
    protected function createCustomizable()
    {
        return [
            'value'    => 'Discuss secret plans that no-one else should know',
            'creator'  => 'U024BE7LH',
            'last_set' => '1360782804',
            'type'     => 'text',
        ];
    }

    protected function createFileResultItem()
    {
        return array_merge($this->createFile(), [
            'channel' => $this->createChannel(),
        ]);
    }

    protected function createMessageResultItem()
    {
        return array_merge($this->createMessage(), [
            'channel' => $this->createSimpleChannel(),
        ]);
    }
}
