<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use BitcoinExchange\Factory;
use \Exception;


try{

	$instance = new Factory("bitstamp", ["key"=>"test", "secret"=>"sdklfj", "client_id"=>0000]);
	$client = $instance->client();

	var_dump($client->balance());
	
}catch(Exception $e){
	echo $e->getMessage()."\n";

}
