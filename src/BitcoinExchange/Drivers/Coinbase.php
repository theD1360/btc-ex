<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use Utilities\Arr;
use BitcoinExchange\Responses\TickerResponse;



class Coinbase extends \Coinbase implements DriverInterface
{

	public function __construct($key, $secret){
		parent::__construct(new \Coinbase_ApiKeyAuthentication($key, $secret));
	}

	public function ticker(){

		$buy = $this->getBuyPrice('1');
		$sell = $this->getSellPrice('1');

		$new_ticker = new TickerResponse([
		  "high"=> null,
		  "last"=> (string) (($buy + $sell)/2),
		  "timestamp"=>  (string) time(),
		  "bid"=> (string) $buy,
		  "volume"=> null,
		  "low"=> null,
		  "ask"=> (string) $sell
		]);
		
		return $new_ticker;		

	}

	public function buy($amount, $price = null){
		$response = parent::buy($amount);
		return new Arr($response);
	}

	public function sell($amount, $price = null){
		$response = parent::sell($amount);
		return new Arr($response);	}

	public function cancel($order_id){
		
	}

	public function balance(){

		$balance = new Arr([
			"usd_balance" => "",
			"btc_balance" => "",
			"usd_reserved" => "",
			"btc_reserved" => "",
			"usd_available" => "",
			"btc_available" => "",
			"fee" => "1",	
		]);

	}

	public function orders(){}

}