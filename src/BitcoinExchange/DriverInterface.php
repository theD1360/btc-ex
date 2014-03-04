<?php namespace BitcoinExchange;

interface DriverInterface {
	
	public function ticker();

	public function buy();

	public function sell();

	public function cancel();

	public function balance();

}