<?php namespace BitcoinExchange;

interface DriverInterface {
	
	public function ticker();

	public function buy($amount, $price);

	public function sell($amount, $price);

	public function cancel($order_id);

	public function balance();

	public function orders();

}