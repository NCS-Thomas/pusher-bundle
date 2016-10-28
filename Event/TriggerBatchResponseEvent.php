<?php

namespace Lsv\PusherBundle\Event;

class TriggerBatchResponseEvent extends TriggerBatchEvent
{

    const NAME = 'lsv_pusher.event.triggerbatch.response';

    /**
     * @var bool|string
     */
    private $response;

    /**
     * TriggerBatchEvent constructor.
     * @param array $batch An array of events to send
     * @param bool $debug [optional]
     * @param bool $already_encoded [optional]
     * @param bool|string $response
     */
    public function __construct($batch = array(), $debug = false, $already_encoded = false, $response)
    {
        parent::__construct($batch, $debug, $already_encoded);
        $this->response = $response;
    }

    /**
     * Get Response
     *
     * @return bool|string
     */
    public function getResponse()
    {
        return $this->response;
    }

}
