<?php
namespace Lsv\PusherBundle\Event;

class GetResponseEvent extends GetEvent
{

    const NAME = 'lsv_pusher.event.get.response';

    /**
     * @var mixed
     */
    private $response;

    /**
     * GetEvent constructor.
     * @param string $path Path excluding /apps/APP_ID
     * @param array $params API params (see http://pusher.com/docs/rest_api)
     * @param mixed $response
     */
    public function __construct($path, $params = array(), $response)
    {
        parent::__construct($path, $params);
        $this->response = $response;
    }

    /**
     * Get Response
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

}
