<?php
namespace Lsv\PusherBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class GetEvent extends Event
{

    const NAME = 'lsv_pusher.event.get';

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $params;

    /**
     * GetEvent constructor.
     * @param string $path Path excluding /apps/APP_ID
     * @param array $params API params (see http://pusher.com/docs/rest_api)
     */
    public function __construct($path, $params = array())
    {
        $this->path = $path;
        $this->params = $params;
    }

    /**
     * Get Path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
