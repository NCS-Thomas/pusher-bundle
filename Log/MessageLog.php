<?php
namespace Lsv\PusherBundle\Log;

class MessageLog
{

    /**
     * @var string
     */
    private $triggerKey;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var string
     */
    protected $level;

    public function __construct($triggerKey, array $parameters)
    {
        $this->triggerKey = $triggerKey;
        $this->parameters = $parameters;
    }

    /**
     * @param string $level
     * @return MessageLog
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getTriggerKey()
    {
        return $this->triggerKey;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }



}
