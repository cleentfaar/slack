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
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class SearchAllApiMethodResponse extends AbstractSearchApiMethodResponse
{
    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->data['messages'] ? $this->data['messages']['matches'] : [];
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->data['files'] ? $this->data['files']['matches'] : [];
    }

    /**
     * {@inheritdoc}
     */
    public function toOutput(OutputInterface $output, Command $command)
    {
        /** @var TableHelper $tableHelper */
        $tableHelper   = $command->getHelper('table');
        $totalMessages = $this->data['messages']['total'];
        $totalFiles    = $this->data['files']['total'];
        $output->writeln(sprintf('Messages found: <comment>%d</comment>', $totalMessages));
        if ($totalMessages > 0) {
            $tableHelper->setHeaders([
                'User',
                'Username',
                'Text',
            ]);
            $rows = [];

            foreach ($this->getMessages() as $message) {
                $rows[] = [
                    $message['user'],
                    $message['username'],
                    $message['text'],
                ];
            }
            $tableHelper->setRows($rows);
            $tableHelper->render($output);
        }
        $output->writeln(sprintf('Files found: <comment>%d</comment>', $totalFiles));
        if ($totalFiles > 0) {
            $tableHelper->setHeaders([
                'Name',
                'Title',
                'Type',
            ]);
            $rows = [];

            foreach ($this->getFiles() as $file) {
                $rows[] = [
                    $file['name'],
                    $file['title'],
                    $file['pretty_type'],
                ];
            }
            $tableHelper->setRows($rows);
            $tableHelper->render($output);
        }
    }
}
