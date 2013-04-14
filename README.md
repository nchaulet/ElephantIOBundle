# Elephant IO Bundle

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

