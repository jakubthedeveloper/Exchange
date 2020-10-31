<?php
declare(strict_types=1);

use JakubTheDeveloper\Exchange\Currency;
use JakubTheDeveloper\Exchange\ExchangeRate;
use JakubTheDeveloper\Exchange\Exchange;
use JakubTheDeveloper\Exchange\ExchangeRates;
use JakubTheDeveloper\Exchange\Exception\InvalidTypeException;
use PHPUnit\Framework\TestCase;

final class ExchangeRatesTest extends TestCase
{
    public function testAddedRateIsReturned(): void
    {
        $currencyOne = new Currency('one');
        $currencyTwo = new Currency('two');

        $exchangeRates = new ExchangeRates([
            new ExchangeRate($currencyOne, $currencyTwo, 0.17, 2),
            new ExchangeRate($currencyTwo, $currencyOne, 3.23, 2),
        ]);

        $this->assertNotNull($exchangeRates->getRate($currencyOne, $currencyTwo));
        $this->assertNotNull($exchangeRates->getRate($currencyTwo, $currencyOne));
    }

    public function testExceptionOnInvalidInputDataType(): void
    {
        $this->expectException(InvalidTypeException::class);

        $exchangeRates = new ExchangeRates([
            "stringIsInvalidHere"
        ]);
    }
}
