<?php
namespace Lsv\PusherBundle\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{

    use LoggerTrait;

    /**
     * @var MessageLog[]
     */
    private $logs = [];

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $log = new MessageLog($message, $context);
        $this->logs[] = $log;
    }

    /**
     * Clear logs
     */
    public function clear()
    {
        $this->logs = [];
    }
    /**
     * Return if logs exist or not
     *
     * @return boolean
     */
    public function hasMessages()
    {
        return $this->getLogs() ? true : false;
    }
    /**
     * Return logs
     *
     * @return MessageLog[]
     */
    public function getLogs()
    {
        return $this->logs;
    }

}
