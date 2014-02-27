<?php namespace BitcoinExchange\Drivers;

class MtGox extends \MtGox\MtGox
{

	public function ticker(){
		return new Arr($this->getTicker());
	}

	public function buy(){
		$params = func_get_args();
		array_unshift($params, "buy");
		return new Arr(call_user_func_array([$this, "placeOrder"], $params));
	}

	public function sell(){
		$params = func_get_args();
		array_unshift($params, "sell");
		return new Arr(call_user_func_array([$this, "placeOrder"], $params));	}

	public function cancel(){
		return new Arr(call_user_func_array([$this, "cancelOrder"], func_get_args()));
	}

	public function balance(){
		$info = parent::getInfo();
		return new Arr($info['Wallets']);
	}

}