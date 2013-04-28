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
     * @param mixed $elephant the elephant
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
    	$this->elephantIO->init();
    	$this->elephantIO->send(Elephant::TYPE_EVENT, null, null, json_encode(array(
    		'name' => $eventName,
    		'args' => $data
    	)));

    	$this->elephantIO->close();
    }
}