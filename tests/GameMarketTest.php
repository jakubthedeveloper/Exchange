<?php
declare(strict_types=1);

use JakubTheDeveloper\Exchange\Currency;
use JakubTheDeveloper\Exchange\ExchangeRate;
use JakubTheDeveloper\Exchange\Exchange;
use JakubTheDeveloper\Exchange\ExchangeRates;
use PHPUnit\Framework\TestCase;

final class GameMarketTest extends TestCase
{
    public function testCanExchangeGoods(): void
    {
        $wood = new Currency('wood');
        $gold = new Currency('gold');
        $food = new Currency('food');

        $exchange = new Exchange(
            new ExchangeRates([
                new ExchangeRate($wood, $gold, 0.10, 2),
                new ExchangeRate($gold, $food, 3.50, 2),
            ])
        );

        $this->assertEquals(1.23, $exchange->exchange($wood, $gold, 12.34));
        $this->assertEquals(18.31, $exchange->exchange($gold, $food, 5.23));
        $this->assertEquals(82332331.24, $exchange->exchange($gold, $food, 23523523.212342343));
    }

    public function testCanNotExchangeUndefinedRates(): void
    {

        $wood = new Currency('wood');
        $gold = new Currency('gold');
        $food = new Currency('food');

        $exchange = new Exchange(
            new ExchangeRates([
                new ExchangeRate($wood, $gold, 0.10, 2),
                new ExchangeRate($gold, $food, 3.50, 2),
            ])
        );

        $this->expectException(\JakubTheDeveloper\Exchange\Exception\InvalidExchangeRateException::class);
        $exchange->exchange($food, $wood, 127.23);
    }
}
