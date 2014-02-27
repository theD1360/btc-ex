<?php namespace BitcoinExchange;

use Utilities\Arr;
use \Exception;
use \ReflectionClass;

class Factory {

	protected $drivers = [
			  	"mtgox" => [
			  		"namespace" => "BitcoinExchange\Drivers\MtGox",
			  		"params" => [
			  			"key",
			  			"secret",
			  			"cert"
			  		]
			  	],
			  	"bitstamp" => [
			  		"namespace" => "BitcoinExchange\Drivers\Bitstamp",
			  		"params" => [
			  			"key",
			  			"secret",
			  			"client_id"
			  		]
			  	],
			  	"btc-e" => [
			  		"namespace" => "BitcoinExchange\Drivers\BTCe",
			  		"params" => [
			  			"key",
			  			"secret",
			  			"base_noonce"
			  		]
			  	]
			  ],
			  $config = [],
			  $instance;

	public function __construct($driver, $config = []){
		// Create new instance of Arr on the drivers list;
		$this->drivers = new Arr($this->drivers);

		$this->config($config);

		$this->build($driver);
	}

	public function config($config){
		$this->config = new Arr($config);
	}

	public function driverConfig($driver){
		$config = $this->config;
		$params = $this->drivers->get($driver)->params->copy();

		$params->each(function(&$val) use ($config){
			$val = $config->get($val);
		});

		return $params;
	}

	public function build($driver = null){
		if(!$driver){
			if($this->config->has("driver") && $this->drivers->has($driver)){
				$driver  = $this->config->driver;
			}else{
				throw new Exception("Invalid Driver");
			}

		}

		$params = $this->driverConfig($driver)->toArray();

		$instance = new ReflectionClass($this->drivers->get($driver)->namespace);
		$this->instance = $instance->newInstanceArgs($params);
		return $this->instance;
		
	}

	public function client(){
		return $this->instance;
	}

}