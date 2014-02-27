<?php namespace BitcoinExchange\Drivers;

use \Exception;

class BTCe extends \BitcoinExchange\Exchanges\BTCeAPI
{
	public function ticker($pair){
		return new Arr($this->getPairTicker($pair));
	}

	// I don't have a BTC-e accout someone will have to contribute
	// this driver to the project

}