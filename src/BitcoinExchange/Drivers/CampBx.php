<?php namespace BitcoinExchange\Drivers;

use BitcoinExchange\DriverInterface;
use BitcoinExchange\Responses\TickerResponse;
use Exception;

class CampBx extends \CampBX\CampBX implements DriverInterface
{

	public function ticker(){
		
		$ticker = $this->xticker();

		$response = new TickerResponse([
			"bid" => $ticker["Best Bid"],
			"ask" => $ticker["Best Ask"],
			"last" => $ticker['Last Trade']
		]);

		return $response;
	
	}

	// I don't have a BTC-e accout someone will have to contribute
	// this driver to the project


	public function buy($amount, $price){
		return new Arr($this->tradeenter(['TradeMode' => 'QuickBuy', 'Quantity' => $amount, 'Price' => $price]));
	}

	public function sell($amount, $price){
		return new Arr($this->tradeenter(['TradeMode' => 'QuickSell', 'Quantity' => $amount, 'Price' => $price]));
	}

	public function cancel($order_id){
		return new Arr($this->cancelorder($order_id));
	}

	public function balance(){
		return new Arr($this->myfunds());
	}

	public function orders(){
		return new Arr($this->myorders());
	}


}