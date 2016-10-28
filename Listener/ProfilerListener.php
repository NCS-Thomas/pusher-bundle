<?php
namespace Lsv\PusherBundle\Listener;

use Lsv\PusherBundle\Event;
use Lsv\PusherBundle\Log\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProfilerListener implements EventSubscriberInterface
{

    /**
     * @var Logger
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onChannelInfoEvent(Event\ChannelInfoResponseEvent $event)
    {
        $this->logger->log(null, Event\ChannelInfoResponseEvent::NAME, [
            'channel' => $event->getChannel(),
            'params' => $event->getParams(),
            'response' => $event->getResponse(),
        ]);
    }

    public function onChannelsEvent(Event\ChannelsResponseEvent $event)
    {
        $this->logger->log(null, Event\ChannelsResponseEvent::NAME, [
            'params' => $event->getParams(),
            'response' => $event->getResponse(),
        ]);
    }

    public function onGetEvent(Event\GetResponseEvent $event)
    {
        $this->logger->log(null, Event\GetResponseEvent::NAME, [
            'path' => $event->getPath(),
            'params' => $event->getParams(),
            'response' => $event->getResponse(),
        ]);
    }

    public function onTriggerBatchEvent(Event\TriggerBatchResponseEvent $event)
    {
        $this->logger->log(null, Event\TriggerBatchResponseEvent::NAME, [
            'batch' => $event->getBatch(),
            'response' => $event->getResponse(),
        ]);
    }

    public function onTriggerEvent(Event\TriggerResponseEvent $event)
    {
        $this->logger->log(null, Event\TriggerResponseEvent::NAME, [
            'channels' => $event->getChannels(),
            'event' => $event->getEvent(),
            'socket_id' => $event->getSocketId(),
            'data' => $event->getData(),
            'response' => $event->getResponse(),
        ]);
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            Event\ChannelInfoResponseEvent::NAME => 'onChannelInfoEvent',
            Event\ChannelsResponseEvent::NAME => 'onChannelsEvent',
            Event\GetResponseEvent::NAME => 'onGetEvent',
            Event\TriggerBatchResponseEvent::NAME => 'onTriggerBatchEvent',
            Event\TriggerResponseEvent::NAME => 'onTriggerEvent'
        ];
    }
}
