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
     * @return \ElephantIO\Client
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
     * Initialize client
     *
     * @return self
     */
    public function initialize()
    {
        $this->elephantIO->initialize();

        return $this;
    }

    /**
     * Set namespace for event
     *
     * @param $namespace
     *
     * @return self
     */
    public function of($namespace)
    {
        $this->elephantIO->of($namespace);

        return $this;
    }

    /**
     * Emit message to socket.io
     *
     * @param string $event
     * @param array  $args
     * @return $this
     */
    public function emit($event, array $args)
    {
        $this->elephantIO->emit($event, $args);

        return $this;
    }

    /**
     * Close client
     */
    public function close()
    {
        $this->elephantIO->close();
    }

    /**
     * Send to socket.io
     * @param string $eventName event name
     * @param mixed  $data      data to send must be serializable
     * @param string $namespace namespace for event
     */
    public function send($eventName, $data, $namespace = '/')
    {
        $this->elephantIO->initialize();
        $this->elephantIO->of($namespace);
        $this->elephantIO->emit($eventName, $data);
        $this->elephantIO->close();
    }
}
