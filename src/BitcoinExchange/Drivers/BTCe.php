<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use Utilities\Arr;
use Exception;

class BTCe extends \BitcoinExchange\Exchanges\BTCeAPI implements DriverInterface
{
	public function ticker($pair = "btc_usd"){
		$response = new Arr($this->getPairTicker($pair));
		$ticker = $response->ticker;

		$new_ticker = new Arr([
		  "high"=> (string) $ticker->high,
		  "last"=> (string) $ticker->last,
		  "timestamp"=>  (string) $ticker->updated,
		  "bid"=> (string) $ticker->buy,
		  "volume"=> (string) $ticker->vol,
		  "low"=> (string) $ticker->low,
		  "ask"=> (string) $ticker->sell
		]);
		
		return $new_ticker;		
	}

	// I don't have a BTC-e accout someone will have to contribute
	// this driver to the project


	public function buy(){}

	public function sell(){}

	public function cancel(){}

	public function balance(){}


}