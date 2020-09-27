# Exchange

[![Build Status](https://travis-ci.org/jakubthedeveloper/Exchange.svg?branch=master)](https://travis-ci.org/jakubthedeveloper/Exchange)

## Installation

```shell script
composer require jakub-the-developer/exchange
```

## Usage

```php
use JakubTheDeveloper\Exchange\Exchange;
use JakubTheDeveloper\Exchange\Currency;
use JakubTheDeveloper\Exchange\ExchangeRate;
use JakubTheDeveloper\Exchange\ExchangeRates;

$euro = new Currency('EUR');
$gbp = new Currency('GBP');
$usd = new Currency('USD');
$yuan = new Currency('RMB');

$exchange = new Exchange(
    new ExchangeRates([
        new ExchangeRate($euro, $gbp, 0.91, 2), // parameters: source currency, target currency, rate, precision
        new ExchangeRate($gbp, $euro, 1.10, 2),
        new ExchangeRate($usd, $yuan, 6.82, 4),
        new ExchangeRate($yuan, $usd, 0.15, 4),
    ])
);

$exchange->exchange($euro, $gbp, 5.14); // 4.68
$exchange->exchange($gbp, $euro, 3.27); // 3.60
$exchange->exchange($usd, $yuan, 17.23); // 117.5086
$exchange->exchange($yuan, $usd, 223.46); // 33.519
```


