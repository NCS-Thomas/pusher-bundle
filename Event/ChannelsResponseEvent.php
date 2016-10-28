<?php

namespace Lsv\PusherBundle\Event;

class ChannelsResponseEvent extends ChannelsEvent
{

    const NAME = 'lsv_pusher.event.channels.response';

    /**
     * @var array
     */
    private $response;

    /**
     * ChannelsEvent constructor.
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     * @param array $response
     */
    public function __construct($params = array(), $response)
    {
        parent::__construct($params);
        $this->response = $response;
    }

    /**
     * Get Response
     *
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

}
