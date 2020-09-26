# Exchange

## Installation

```shell script
composer install jakub-the-developer/exchange
```

## Usage

```php
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

## Run Tests
```shell script
./vendor/bin/phpunit tests
```

