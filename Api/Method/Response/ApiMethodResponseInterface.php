<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method\Response;

use Guzzle\Http\Message\Response;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
interface ApiMethodResponseInterface
{
    const ERROR_CHANNEL_NOT_FOUND = 'channel_not_found';
    const ERROR_INVALID_TOKEN = 'invalid_token';

    /**
     * @param Response $response
     */
    public function __construct(Response $response);

    /**
     * @return bool
     */
    public function isOk();

    /**
     * @return array
     */
    public function getData();

    /**
     * @return string|null
     */
    public function getError();

    /**
     * @param OutputInterface $output
     * @param Command         $command
     */
    public function toOutput(OutputInterface $output, Command $command);
}
