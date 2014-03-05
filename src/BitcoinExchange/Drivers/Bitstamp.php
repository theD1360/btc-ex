<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use Utilities\Arr;

class Bitstamp extends \BitcoinExchange\Exchanges\Bitstamp implements DriverInterface
{

	public function ticker(){
		return new Arr(parent::ticker());
	}

	public function buy(){
		return new Arr(call_user_func_array([$this, "buyBTC"], func_get_args()));
	}

	public function sell(){
		return new Arr(call_user_func_array([$this, "sellBTC"], func_get_args()));
	}

	public function cancel(){
		return new Arr(call_user_func_array([$this, "cancelOrder"], func_get_args()));
	}

	public function balance(){
		return new Arr(parent::balance());
	}

	public function orders(){}

}