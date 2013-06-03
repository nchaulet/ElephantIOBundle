# Elephant IO Bundle

[![Build Status](https://travis-ci.org/nchaulet/ElephantIOBundle.png)](https://travis-ci.org/nchaulet/ElephantIOBundle)

[![knpbundles.com](http://knpbundles.com/nchaulet/ElephantIOBundle/badge)](http://knpbundles.com/nchaulet/ElephantIOBundle)


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
