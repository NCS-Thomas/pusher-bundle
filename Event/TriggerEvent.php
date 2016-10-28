<?php

namespace Lsv\PusherBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class TriggerEvent extends Event
{

    const NAME = 'lsv_pusher.event.trigger';

    /**
     * @var array|string
     */
    private $channels;

    /**
     * @var string
     */
    private $event;

    /**
     * @var mixed
     */
    private $data;

    /**
     * @var null|string
     */
    private $socket_id;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var bool
     */
    private $already_encoded;

    /**
     * TriggerEvent constructor.
     * @param array|string $channels An array of channel names to publish the event on.
     * @param string $event
     * @param mixed $data Event data
     * @param string $socket_id [optional]
     * @param bool $debug [optional]
     * @param bool $already_encoded [optional]
     */
    public function __construct($channels, $event, $data, $socket_id = null, $debug = false, $already_encoded = false)
    {
        $this->channels = $channels;
        $this->event = $event;
        $this->data = $data;
        $this->socket_id = $socket_id;
        $this->debug = $debug;
        $this->already_encoded = $already_encoded;
    }

    /**
     * Get Channels
     *
     * @return array|string
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * Get Event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Get Data
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get SocketId
     *
     * @return null|string
     */
    public function getSocketId()
    {
        return $this->socket_id;
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
