<?php
declare(strict_types=1);

use JakubTheDeveloper\Exchange\Currency;
use JakubTheDeveloper\Exchange\ExchangeRate;
use JakubTheDeveloper\Exchange\Exchange;
use JakubTheDeveloper\Exchange\ExchangeRates;
use PHPUnit\Framework\TestCase;

final class CurrencyExchangeTest extends TestCase
{
    public function testCanConvertOneCurrencyToAnother(): void
    {
        $euro = new Currency('EUR');
        $gbp = new Currency('GBP');
        $usd = new Currency('USD');
        $yuan = new Currency('RMB');

        $exchange = new Exchange(
            new ExchangeRates([
                new ExchangeRate($euro, $gbp, 0.91, 2),
                new ExchangeRate($gbp, $euro, 1.10, 2),
                new ExchangeRate($usd, $yuan, 6.82, 4),
                new ExchangeRate($yuan, $usd, 0.15, 4),
            ])
        );

        $this->assertEquals(4.68, $exchange->exchange($euro, $gbp, 5.14));
        $this->assertEquals(3.60, $exchange->exchange($gbp, $euro, 3.27));
        $this->assertEquals(117.5086, $exchange->exchange($usd, $yuan, 17.23));
        $this->assertEquals(33.519, $exchange->exchange($yuan, $usd, 223.46));
    }

    public function testCanNotExchangeUndefinedRates(): void
    {
        $euro = new Currency('EUR');
        $gbp = new Currency('GBP');
        $usd = new Currency('USD');
        $yuan = new Currency('RMB');

        $exchange = new Exchange(
            new ExchangeRates([
                new ExchangeRate($euro, $gbp, 0.91, 2),
                new ExchangeRate($gbp, $euro, 1.10, 2),
                new ExchangeRate($yuan, $usd, 0.15, 4),
            ])
        );

        $this->expectException(\JakubTheDeveloper\Exchange\Exception\InvalidExchangeRateException::class);
        $exchange->exchange($usd, $yuan, 17.23);
    }
}
