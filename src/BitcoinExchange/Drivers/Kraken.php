<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use BitcoinExchange\Responses\TickerResponse;

use Utilities\Arr;
use Exception;

class Kraken extends \Payward\KrakenAPI implements DriverInterface
{
	public function ticker($pair = "XXBTZUSD"){
		$response = new Arr($this->QueryPublic('Ticker', array('pair' => $pair)));
		$ticker = $response->result->get($pair);

		$new_ticker = new TickerResponse([
		  "high"=> (string) $ticker->h->at(0),
		  "last"=> (string) $ticker->c->first(),
		  "timestamp"=>  (string) time(),
		  "bid"=> (string) $ticker->b->first(),
		  "volume"=> (string) $ticker->v->first(),
		  "low"=> (string) $ticker->l->first(),
		  "ask"=> (string) $ticker->a->first()
		]);
		
		return $new_ticker;		
	}

	// I don't have a Kraken accout someone will have to contribute
	// this driver to the project


	public function buy($price, $amount){}

	public function sell($price, $amount){}

	public function cancel($order_id){}

	public function balance(){}
	
	public function orders(){}


}