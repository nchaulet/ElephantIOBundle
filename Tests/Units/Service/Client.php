<?php

namespace Nc\Bundle\ElephantIOBundle\Tests\Units\Service;

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
            ->then($client->send('eventnameTest', ['foo' => 'test']))
            ->mock($elephant)
                ->call('initialize')
                    ->once()
                ->call('emit')
                    ->once()

                    ->withArguments('eventnameTest', ['foo' => 'test'])
                ->call('close')
                    ->once();
    }

}
