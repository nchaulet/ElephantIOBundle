# Elephant IO Bundle

[![Build Status](https://travis-ci.org/nchaulet/ElephantIOBundle.png)](https://travis-ci.org/nchaulet/ElephantIOBundle)

[![knpbundles.com](http://knpbundles.com/nchaulet/ElephantIOBundle/badge)](http://knpbundles.com/nchaulet/ElephantIOBundle)

[![Sensio insight](https://insight.sensiolabs.com/projects/95656013-0bba-426c-90be-07a3b88a5eb6/mini.png)](https://insight.sensiolabs.com/projects/95656013-0bba-426c-90be-07a3b88a5eb6)

[Elephant.io](https://github.com/Wisembly/elephant.io) library integration in symfony2.

This bundle allows you to communicate with a socket.io server from a Symfony2 application.


## configuration sample

	nc_elephant_io:
	    clients:
	        default:
	            connection: http://192.168.0.14:3006
	        your_key:
	            connection: http://192.168.0.14:3000

## usage

	$client = $this->get('elephantio_client.your_key');
    $client->send('event id', $serializableData);

## More complex usage

	$client = $this->get('elephantio_client.your_key');
	$elephantIOClient = $client->getElephantIO();

## Contribute ? 

If you want to improve this bundle, you can use github pull-request and issue
