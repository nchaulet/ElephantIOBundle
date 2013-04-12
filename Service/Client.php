<?php

namespace Nc\Bundle\ElephantIOBundle\Service;


use ElephantIO\Client as Elephant;
/**
* Client to intereact with elephant.io client
*/
class Client
{

	/** Elephant io Client */
	protected $elephant;

    /**
     * Gets the value of elephant.
     *
     * @return mixed
     */
    public function getElephant()
    {
        return $this->elephant;
    }

    /**
     * Constructor sets the value of elephant.
     * @param mixed $elephant the elephant
     *
     * @return self
     */
    public function __construct(Elephant $elephant)
    {
        $this->elephant = $elephant;

        return $this;
    }

    /**
    * Send to socketio
    * @param string $eventName event name
    * @param mixed  $data      data to send must be serializable
    */
    public function send($eventName, $data)
    {
    	$this->elephant->init();
    	$this->elephant->send(Elephant::TYPE_EVENT, null, null, json_encode(array(
    		'name' => $eventName,
    		'args' => $data
    	)));

    	$this->elephant->close();
    }
}