<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class MethodFactory
{
    const METHOD_AUTH_TEST        = 'AUTH_TEST';
    const METHOD_CHANNELS_HISTORY = 'CHANNELS_HISTORY';
    const METHOD_CHANNELS_INFO    = 'CHANNELS_INFO';
    const METHOD_CHAT_POSTMESSAGE = 'CHAT_POSTMESSAGE';
    const METHOD_SEARCH_ALL       = 'SEARCH_ALL';
    const METHOD_SEARCH_FILES     = 'SEARCH_FILES';
    const METHOD_SEARCH_MESSAGES  = 'SEARCH_MESSAGES';
    const METHOD_USERS_LIST       = 'USERS_LIST';

    /**
     * Creates an ApiMethod object from the given alias and options
     *
     * @param string $alias
     * @param array  $options
     *
     * @return MethodInterface
     *
     * @throws \InvalidArgumentException
     */
    public static function create($alias, array $options = array())
    {
        switch ($alias) {
            case self::METHOD_AUTH_TEST:
                $method = new AuthTestMethod($options);
                break;
            case self::METHOD_CHANNELS_HISTORY:
                $method = new ChannelsHistoryMethod($options);
                break;
            case self::METHOD_CHANNELS_INFO:
                $method = new ChannelsInfoMethod($options);
                break;
            case self::METHOD_CHAT_POSTMESSAGE:
                $method = new ChatPostMessageMethod($options);
                break;
            case self::METHOD_SEARCH_ALL:
                $method = new SearchAllMethod($options);
                break;
            case self::METHOD_SEARCH_FILES:
                $method = new SearchFilesMethod($options);
                break;
            case self::METHOD_SEARCH_MESSAGES:
                $method = new SearchMessagesMethod($options);
                break;
            case self::METHOD_USERS_LIST:
                $method = new UsersListMethod($options);
                break;
            default:
                throw new \InvalidArgumentException(sprintf(
                    'Unknown alias to create a method with: "%s". Currently supported methods: "%s"',
                    $alias,
                    implode('","', [
                        self::METHOD_AUTH_TEST,
                        self::METHOD_CHAT_POSTMESSAGE,
                        self::METHOD_CHANNELS_HISTORY,
                        self::METHOD_SEARCH_ALL,
                        self::METHOD_SEARCH_FILES,
                        self::METHOD_SEARCH_MESSAGES,
                        self::METHOD_USERS_LIST,
                    ])
                ));
        }

        return $method;
    }
}
