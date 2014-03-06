BTC-ex
======

Multi-exchange bitcoin trading interface for php.

This project aims to create a common interface to the various exchange API's that is easy to install and use via composer.

Curent list of clients and their status is as follows.

* Bitstamp - willmoss/bitstamp-php-api (mostly normalized)
* ~~MtGox - thed1360/mtgox-api-v1-php-class (mostly normalized __doesn't matter they're dead anyways__)~~
* BTC-e - marinu666/PHP-btce-api (only ticker method normalized)
* Kraken - payward/kraken-api-client (only ticker method normalized)

Installation
============

Installation is extremely easy using composer by adding the package to your `composer.json`

```
    "require": {
        "php": ">=5.4.0",
        "thed1360/array-helper": "dev-master",
        "thed1360/btc-ex": "dev-master"
    }
```

If you are unfamiliar please visit.
* https://getcomposer.org/
* https://packagist.org/


Usage
=====
```
use BitcoinExchange\Factory;
use \Exception;


try{
	// first parameter is the driver mtgox|btc-e|bitstamp
	// second parameter is an array with the key, secret, and usually a third parameter which is either client_id, cert, or noonce

	$instance = new Factory("bitstamp", ["key"=>"test", "secret"=>"sdklfj", "client_id"=>0000]);
	$client = $instance->client();

	var_dump($client->balance());
	
}catch(Exception $e){
	echo $e->getMessage()."\n";

}
```

As work progresses the aim is to normalize not only the methods into simple `buy`, `sell`, `ticker`, `cancel`, and `balance` but to also normalize their output as well. 

Currently all but one of the libraries (the dead one) are included in this package but I will be trying to work with the authors to have them published to packagist. 

Drivers
=======

Drivers are extensions of the libraries for the different APIs and mormalize the methods and their output. 

The standard is to return an Arr object for every response. Once you have written a driver you can add it to the Factory::Divers array to make it available to us.


Contributions
=============

Currently this project needs contributions not only by the original authors of the libraries but we also require people with accounts at different exchanges to write drivers.

If you would like to make a contribution just fork us and make a pull request.
