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

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class AuthTestApiMethodResponse extends ApiMethodResponse
{
    /**
     * @return string
     */
    public function getUser()
    {
        return $this->data['user'];
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->data['user_id'];
    }

    /**
     * @return string
     */
    public function getTeam()
    {
        return $this->data['team'];
    }

    /**
     * @return string
     */
    public function getTeamId()
    {
        return $this->data['team_id'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->data['url'];
    }

    /**
     * {@inheritdoc}
     */
    public function toOutput(OutputInterface $output, Command $command)
    {
        $tableHelper = $command->getHelper('table');
        $tableHelper->setHeaders([
            'Key',
            'Value',
        ]);
        $tableHelper->setRows([
            ['User', $this->getUser()],
            ['User ID', $this->getUserId()],
            ['Team', $this->getTeam()],
            ['Team ID', $this->getTeamId()],
            ['URL', $this->getUrl()],
        ]);
        $tableHelper->render($output);
    }
}
