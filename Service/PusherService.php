<?php
namespace Lsv\PusherBundle\Service;

use Lsv\PusherBundle\Event as Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PusherService extends \Pusher
{

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function setEventDispatcher(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Trigger an event by providing event name and payload.
     * Optionally provide a socket ID to exclude a client (most likely the sender).
     *
     * @param array $channels An array of channel names to publish the event on.
     * @param string $event
     * @param mixed $data Event data
     * @param string $socket_id [optional]
     * @param bool $debug [optional]
     * @param bool $already_encoded [optional]
     *
     * @return bool|string
     */
    public function trigger($channels, $event, $data, $socket_id = null, $debug = false, $already_encoded = false)
    {
        $this->dispatcher->dispatch(
            Event\TriggerEvent::NAME,
            new Event\TriggerEvent($channels, $event, $data, $socket_id, $debug, $already_encoded)
        );

        $response = parent::trigger($channels, $event, $data, $socket_id, $debug, $already_encoded);

        $this->dispatcher->dispatch(
            Event\TriggerResponseEvent::NAME,
            new Event\TriggerResponseEvent($channels, $event, $data, $socket_id, $debug, $already_encoded, $response)
        );

        return $response;
    }

    /**
     * Trigger multiple events at the same time.
     *
     * @param array $batch An array of events to send
     * @param bool $debug [optional]
     * @param bool $already_encoded [optional]
     *
     * @return bool|string
     */
    public function triggerBatch($batch = array(), $debug = false, $already_encoded = false)
    {
        $this->dispatcher->dispatch(
            Event\TriggerBatchEvent::NAME,
            new Event\TriggerBatchEvent($batch, $debug, $already_encoded)
        );

        $response = parent::triggerBatch($batch, $debug, $already_encoded);

        $this->dispatcher->dispatch(
            Event\TriggerBatchResponseEvent::NAME,
            new Event\TriggerBatchResponseEvent($batch, $debug, $already_encoded, $response)
        );

        return $response;
    }

    /**
     *	Fetch channel information for a specific channel.
     *
     * @param string $channel The name of the channel
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     *
     * @return object
     */
    public function get_channel_info($channel, $params = array())
    {
        $this->dispatcher->dispatch(
            Event\ChannelInfoEvent::NAME,
            new Event\ChannelInfoEvent($channel, $params)
        );

        $response = parent::get_channel_info($channel, $params);

        $this->dispatcher->dispatch(
            Event\ChannelInfoResponseEvent::NAME,
            new Event\ChannelInfoResponseEvent($channel, $params, $response)
        );

        return $response;
    }

    /**
     * Fetch a list containing all channels.
     *
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     *
     * @return array
     */
    public function get_channels($params = array())
    {
        $this->dispatcher->dispatch(
            Event\ChannelsEvent::NAME,
            new Event\ChannelsEvent($params)
        );

        $response = parent::get_channels($params);

        $this->dispatcher->dispatch(
            Event\ChannelsResponseEvent::NAME,
            new Event\ChannelsResponseEvent($params, $response)
        );

        return $response;
    }

    /**
     * GET arbitrary REST API resource using a synchronous http client.
     * All request signing is handled automatically.
     *
     * @param string path Path excluding /apps/APP_ID
     * @param params array API params (see http://pusher.com/docs/rest_api)
     *
     * @return See Pusher API docs
     */
    public function get($path, $params = array())
    {
        $this->dispatcher->dispatch(
            Event\GetEvent::NAME,
            new Event\GetEvent($path, $params)
        );

        $response = parent::get($path, $params);

        $this->dispatcher->dispatch(
            Event\GetResponseEvent::NAME,
            new Event\GetResponseEvent($path, $params, $response)
        );

        return $response;
    }

}
