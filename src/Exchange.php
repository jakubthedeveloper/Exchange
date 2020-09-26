<?php

namespace JakubTheDeveloper\Exchange;

class Exchange {
    /** @var ExchangeRates */
    private ExchangeRates $exchangeRates;

    /**
     * Exchange constructor.
     * @param ExchangeRates $exchangeRates
     */
    public function __construct(ExchangeRates $exchangeRates)
    {
        $this->exchangeRates = $exchangeRates;
    }

    /**
     * @param Currency $from
     * @param Currency $to
     * @param float $amount
     * @return float
     * @throws Exception\InvalidExchangeRateException
     */
    public function exchange(Currency $from, Currency $to, float $amount): float
    {
        $rate = $this->exchangeRates->getRate($from, $to);
        return round($rate->getRate() * $amount, $rate->getPrecision());
    }
}
