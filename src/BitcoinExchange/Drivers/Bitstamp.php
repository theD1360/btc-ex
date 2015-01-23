<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use BitcoinExchange\Responses\TickerResponse;

use Utilities\Arr;

class Bitstamp extends \Bitstamp\Bitstamp implements DriverInterface
{

	public function ticker(){
		return new TickerResponse(parent::ticker());
	}

	public function buy($amount, $price){
		return new Arr(call_user_func_array([$this, "buyBTC"], func_get_args()));
	}

	public function sell($amount, $price){
		return new Arr(call_user_func_array([$this, "sellBTC"], func_get_args()));
	}

	public function cancel($order_id){
		return new Arr(call_user_func_array([$this, "cancelOrder"], func_get_args()));
	}

	public function balance(){
		return new Arr(parent::balance());
	}

	public function orders(){

		return new Arr($this->openOrders());
	}

}