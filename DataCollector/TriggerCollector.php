<?php
namespace Lsv\PusherBundle\DataCollector;

use Lsv\PusherBundle\Log\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class TriggerCollector extends DataCollector
{

    /**
     * @var Logger
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Collects data for the given Request and Response.
     *
     * @param Request $request A Request instance
     * @param Response $response A Response instance
     * @param \Exception $exception An Exception instance
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = [
            'logs' => $this->logger->getLogs(),
        ];
    }

    public function getCount()
    {
        return count($this->data['logs']);
    }

    public function getLogs()
    {
        return $this->data['logs'];
    }

    /**
     * Returns the name of the collector.
     *
     * @return string The collector name
     */
    public function getName()
    {
        return 'lsv_pusher';
    }
    
    public function reset()
    {
    	$this->data = [];
    }
}
