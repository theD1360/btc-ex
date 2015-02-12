<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use BitcoinExchange\Responses\TickerResponse;

use Utilities\Arr;

class Simulation extends Bitstamp implements DriverInterface
{

	protected $balance = [
		"BTC" => 0.00000000,
		"USD" => 0.00
	];

	protected $fee = 0.006;

	protected $orders;

	public function __construct($btcBal, $usdBal)
	{
		// plug in random vals to instanciate and run ticker without authing 
		parent::__construct("fdas", "asdf", "5634");
		$this->balance["BTC"] = (float) $btcBalance;
		$this->balance["USD"] = (float) $usdBalance;
		$this->orders = new Arr();
	}

	public function ticker(){
		return parent::ticker();
	}

	public function buy($amount, $price){

		$order = [
			"id" => $this->orders->count() + 1,
			"type" => "buy",
			"amount" => $amount, 
			"price" => $price,
			"total" => (($amount*$price) + (($amount*$price)*$this->fee)),
			"status" => "complete"
		];

 		
 		if($this->balance["USD"] < $order['total']){
 			throw new \Exception("Order amount exceeds balance");
 		}

		$this->balance["USD"] = $this->balance["USD"] - $order['total'];
		$this->balance["BTC"] = $this->balance['BTC'] + $amount;

		$this->orders->insert($order);

		return new Arr($order);
	}

	public function sell($amount, $price){
		$order = [
			"id" => $this->orders->count() + 1,
			"type" => "sell",
			"amount" => $amount, 
			"price" => $price,
			"total" => (($price/$amount) - (($price/$amount)*$this->fee)),
			"status" => "complete"
		];

 		
 		if($this->balance["BTC"] < $amount){
 			throw new \Exception("Order amount exceeds balance");
 		}

		$this->balance["BTC"] = $this->balance["BTC"] - $amount;
		$this->balance["USD"] = $this->balance['USD'] + $order['total'];

		$this->orders->insert($order);

		return new Arr($order);
	}

	public function cancel($order_id){
		return new Arr(call_user_func_array([$this, "cancelOrder"], func_get_args()));
	}

	public function balance(){
		return new Arr([
			"usd_balance" => $this->balance["USD"],
			"btc_balance" => $this->balance["BTC"],
			"usd_reserved" => "",
			"btc_reserved" => "",
			"usd_available" => $this->balance["USD"],
			"btc_available" => $this->balance["BTC"],
			"fee" => $this->fee,	
		]);
	}

	public function orders(){

		return $this->orders;
	}

}