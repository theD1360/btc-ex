<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use BitcoinExchange\Factory;
use \Exception;

$configs = [
	"bitstamp" => ["key"=>"test", "secret"=>"sdklfj", "client_id"=>0000],
	"btc-e" => ["key"=>"test", "secret"=>"sdklfj"],
	"kraken" => ["key"=>"test", "secret"=>"sdklfj"],
	"coinbase" => ["key"=>"test", "secret"=>"sdklfj"],
	"campbx" => ["username"=>"test", "password"=>"sdklfj"]
];

$instances  = [];

try{

	foreach($configs as $driver => $config){
		$instances[$driver] = new Factory($driver, $config);
	}

	
}catch(Exception $e){
	echo $e->getMessage()."\n";

}


try{

	foreach($instances as $driver=>$instance){
		$c = $instance->client();
		echo "Driver: $driver\n";
		var_dump($c->ticker());
	}

}catch(Exception $e){
	echo $e->getMessage()."\n";

}
