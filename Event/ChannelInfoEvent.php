<?php
namespace Lsv\PusherBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ChannelInfoEvent extends Event
{

    const NAME = 'lsv_pusher.event.channelinfo';

    /**
     * @var string
     */
    private $channel;

    /**
     * @var array
     */
    private $params;

    /**
     * @param string $channel The name of the channel
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     */
    public function __construct($channel, $params = array())
    {
        $this->channel = $channel;
        $this->params = $params;
    }

    /**
     * Get Channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
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
