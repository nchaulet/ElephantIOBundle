<?php

namespace Nc\Bundle\ElephantIOBundle\Tests\Units\Service;

require_once __DIR__.'/../../../vendor/autoload.php';

use Nc\Bundle\ElephantIOBundle\Service\Client as TestedClient;
use mageekguy\atoum;

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
		$this->assert('call constructor with bad arguments')
			->when(function() {
				$testClient = new TestedClient('bad argument');
			})
			->error()
			->exists();

		$this->mockGenerator->orphanize('__construct');
		$this->mockGenerator->shuntParentClassCalls();
		$this->assert('call constructor with valid argument')
			->object(new TestedClient(new \mock\ElephantIO\Client()));
	}

}