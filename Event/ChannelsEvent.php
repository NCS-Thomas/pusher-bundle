<?php

namespace Lsv\PusherBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ChannelsEvent extends Event
{

    const NAME = 'lsv_pusher.event.channels';

    /**
     * @var array
     */
    private $params;

    /**
     * ChannelsEvent constructor.
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     */
    public function __construct($params = array())
    {
        $this->params = $params;
    }

    /**
     * Get Params
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

}
