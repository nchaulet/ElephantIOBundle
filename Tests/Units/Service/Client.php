<?php

namespace Nc\Bundle\ElephantIOBundle\Tests\Units\Service;

require_once __DIR__.'/../../../vendor/autoload.php';

use Nc\Bundle\ElephantIOBundle\Service\Client as TestedClient;
use mageekguy\atoum;
use ElephantIO\Client as Elephant;

/**
* Client to intereact with elephant.io client
*/
class Client extends atoum\test
{

	/**
	* Test client constructor
	*/
	public function testConstructor()
	{
		$this->assert('Test constructor type hinting')
			->if($method = new \ReflectionMethod('Nc\Bundle\ElephantIOBundle\Service\Client', '__construct'))
			->and($arguments = $method->getParameters())
			->then
			->sizeof($arguments)->isEqualTo(1)
			->string($arguments[0]->getClass()->getName())->isEqualTo('ElephantIO\Client');

		$this->mockGenerator->orphanize('__construct');
		$this->mockGenerator->shuntParentClassCalls();
		$this->assert('call constructor with valid argument')
			->object(new TestedClient(new \mock\ElephantIO\Client()));
	}


	/**
	* Test get elephant method
	*/
	public function testGetElephantIO()
	{

		$this->mockGenerator->orphanize('__construct');
		$this->mockGenerator->shuntParentClassCalls();
		$this->assert('call getClient')
			->object($client = new TestedClient($elephant = new \mock\ElephantIO\Client()))
			->then
			->object($client->getElephantIO())
			->isEqualTo($elephant);
	}

	/**
	* Test send method
	*/
	public function testSend()
	{

		$this->mockGenerator->orphanize('__construct');
		$this->mockGenerator->orphanize('init');
		$this->mockGenerator->orphanize('send');
		$this->mockGenerator->orphanize('close');
		$this->mockGenerator->shuntParentClassCalls();
		$this->assert('call getClient')
			->object($client = new TestedClient($elephant = new \mock\ElephantIO\Client()))
			->then
			->then($client->send('eventnameTest', 'data'))
			->mock($elephant)
				->call('init')
					->once()
				->call('send')
					->once()
					->withArguments(json_encode(array(
			    		'name' => 'eventnameTest',
			    		'args' => 'data'
			    	)))
		    		->withArguments(Elephant::TYPE_EVENT)
		    	->call('close')
					->once();
	}

}
