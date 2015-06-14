<?php

namespace Nc\Bundle\ElephantIOBundle\Service;


use ElephantIO\Client as Elephant;
/**
* Client to intereact with elephant.io client
*/
class Client
{

    /** Elephant io Client */
    protected $elephantIO;

    /**
     * Gets the value of elephant.
     *
     * @return mixed
     */
    public function getElephantIO()
    {
        return $this->elephantIO;
    }

    /**
     * Constructor sets the value of elephant.
     * @param mixed $elephantIO the elephant io client
     *
     * @return self
     */
    public function __construct(Elephant $elephantIO)
    {
        $this->elephantIO = $elephantIO;

        return $this;
    }

    /**
    * Send to socketio
    * @param string $eventName event name
    * @param mixed  $data      data to send must be serializable
    */
    public function send($eventName, $data)
    {
        $this->elephantIO->initialize();
        $this->elephantIO->emit($eventName, $data);
        $this->elephantIO->close();
    }
}
