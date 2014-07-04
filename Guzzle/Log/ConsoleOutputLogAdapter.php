<?php

namespace CL\Slack\Guzzle\Log;

use Guzzle\Log\LogAdapterInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleOutputLogAdapter  implements LogAdapterInterface
{
    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * Log a message at a priority
     *
     * @param string  $message  Message to log
     * @param integer $priority Priority of message (use the \LOG_* constants of 0 - 7)
     * @param array   $extras   Extra information to log in event
     */
    public function log($message, $priority = LOG_INFO, $extras = array())
    {
        $this->output->writeln($message);
    }
}
