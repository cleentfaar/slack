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
class ApiMethodResponse implements ApiMethodResponseInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * {@inheritdoc}
     */
    public function __construct(Response $response)
    {
        $this->data = json_decode($response->getBody(true), true);
    }

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        return (bool) $this->data['ok'];
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function getError()
    {
        return array_key_exists('error', $this->data) ? $this->data['error'] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function toOutput(OutputInterface $output, Command $command)
    {
        return;
    }
}
