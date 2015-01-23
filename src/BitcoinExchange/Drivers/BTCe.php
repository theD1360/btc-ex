<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use BitcoinExchange\Responses\TickerResponse;

use Utilities\Arr;
use Exception;

class BTCe extends \Undelete\BTCEApi\Api implements DriverInterface
{
	protected $default_pair = "btc_usd";

	public function ticker($pair = "btc_usd"){

		if(empty($pair)){
			$pair = $this->default_pair;
		}

		return new TickerResponse($this->getTicker($pair));
	
	}

	// I don't have a BTC-e accout someone will have to contribute
	// this driver to the project


	public function buy($amount, $price){
		return new Arr($this->orderTrade($this->default_pair, 'buy', $amount, $price));
	}

	public function sell($amount, $price){
		return new Arr($this->orderTrade($this->default_pair, 'sell', $amount, $price));
	}

	public function cancel($order_id){
		return new Arr($this->cancelOrder($order_id));
	}

	public function balance(){
		return new Arr($this->getFunds());
	}

	public function orders(){
		return new Arr($this->getActiveOrders());
	}


}