<?php

namespace Lsv\PusherBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class TriggerBatchEvent extends Event
{

    const NAME = 'lsv_pusher.event.triggerbatch';

    /**
     * @var array
     */
    private $batch;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var bool
     */
    private $already_encoded;

    /**
     * TriggerBatchEvent constructor.
     * @param array $batch An array of events to send
     * @param bool $debug [optional]
     * @param bool $already_encoded [optional]
     */
    public function __construct($batch = array(), $debug = false, $already_encoded = false)
    {
        $this->batch = $batch;
        $this->debug = $debug;
        $this->already_encoded = $already_encoded;
    }

    /**
     * Get Batch
     *
     * @return array
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * Get Debug
     *
     * @return boolean
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * Get AlreadyEncoded
     *
     * @return boolean
     */
    public function isAlreadyEncoded()
    {
        return $this->already_encoded;
    }

}
