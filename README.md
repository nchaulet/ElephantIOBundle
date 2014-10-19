# Elephant IO Bundle

[![Build Status](https://travis-ci.org/nchaulet/ElephantIOBundle.png)](https://travis-ci.org/nchaulet/ElephantIOBundle)

[![knpbundles.com](http://knpbundles.com/nchaulet/ElephantIOBundle/badge)](http://knpbundles.com/nchaulet/ElephantIOBundle)

[![Sensio insight](https://insight.sensiolabs.com/projects/95656013-0bba-426c-90be-07a3b88a5eb6/mini.png)](https://insight.sensiolabs.com/projects/95656013-0bba-426c-90be-07a3b88a5eb6)

[Elephant.io](https://github.com/Wisembly/elephant.io) library integration in symfony2.

This bundle allows you to communicate with a socket.io server (0.x or 1.x) from a Symfony2 application.

## configuration sample

	nc_elephant_io:
	    clients:
	        default:
	            connection: http://192.168.0.14:3006
	            # specify version 0.x for 0.* version and 1.x for 1.0 version
	            version: 0.x 
	        your_key:
	            connection: http://192.168.0.14:3000
	            version: 1.x

## usage

	$client = $this->get('elephantio_client.your_key');
    $client->send('event_name', ['foo' => 'test']);

## More complex usage

	$client = $this->get('elephantio_client.your_key');
	$elephantIOClient = $client->getElephantIO();
	// Refer to Elephant.io doc

## Contribute ? 

If you want to improve this bundle, you can use github pull-request and issue
