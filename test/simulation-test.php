<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use BitcoinExchange\Factory;
use \Exception;


try{

	$instance = new Factory("simulation", ["btcBal"=>5.0000, "usdBal"=>1000]);
	$client = $instance->client();

	echo "ticker and balance\n";
	$ticker = $client->ticker();
	var_dump($ticker);
	var_dump($client->balance());


	echo "buy and balance\n";
	var_dump($client->buy(1, $ticker->last));
	var_dump($client->balance());

	echo "sale and balance\n";
	var_dump($client->sell(1, $ticker->last));
	var_dump($client->balance());


	echo "orders\n";
	var_dump($client->orders());

	
}catch(Exception $e){
	echo $e->getMessage()."\n";

}
