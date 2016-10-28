<?php
/**
 * Copyright (c) 2016 <Martin Aarhof>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Lsv\PusherBundle\Event;

class TriggerResponseEvent extends TriggerEvent
{

    const NAME = 'lsv_pusher.event.trigger.response';

    /**
     * @var bool|string
     */
    private $response;

    /**
     * TriggerEvent constructor.
     * @param array|string $channels An array of channel names to publish the event on.
     * @param string $event
     * @param mixed $data Event data
     * @param string $socket_id [optional]
     * @param bool $debug [optional]
     * @param bool $already_encoded [optional]
     * @param bool|string $response
     */
    public function __construct($channels, $event, $data, $socket_id = null, $debug = false, $already_encoded = false, $response)
    {
        parent::__construct($channels, $event, $data, $socket_id, $debug, $already_encoded);
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
