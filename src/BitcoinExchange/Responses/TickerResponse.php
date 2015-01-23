<?php

namespace BitcoinExchange\Responses;

class TickerResponse extends \Utilities\Arr {
	
	protected $data = [
		  "high"=> null,
		  "last"=> null,
		  "timestamp"=>  null,
		  "bid"=> null,
		  "volume"=> null,
		  "low"=> null,
		  "ask"=> null
	];

}