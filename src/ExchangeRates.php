<?php


namespace JakubTheDeveloper\Exchange;

use JakubTheDeveloper\Exchange\Exception\InvalidExchangeRateException;
use JakubTheDeveloper\Exchange\Exception\InvalidTypeException;
use JakubTheDeveloper\Exchange\Exception\NotImplementedException;

class ExchangeRates
{
    /** @var ExchangeRate[] */
    private array $rates = [];

    /**
     * ExchangeRates constructor.
     * @param array $rates
     * @throws \Exception
     */
    public function __construct(array $rates)
    {
        foreach ($rates as $rate) {
            if (!$rate instanceof ExchangeRate) {
                throw new InvalidTypeException("Rate should be an instance of ExchangeRate, got " . (is_object($rate) ? get_class($rate) : $rate) . ".");
            }

            $this->rates[$rate->getKey()] = $rate;
        }
    }

    /**
     * @param Currency $from
     * @param Currency $to
     * @return ExchangeRate
     * @throws InvalidExchangeRateException
     */
    public function getRate(Currency $from, Currency $to): ExchangeRate
    {
        $key = ExchangeRateKeyGenerator::generate($from, $to);

        if (!array_key_exists($key, $this->rates)) {
            throw new InvalidExchangeRateException("Exchange rate is not configured for currencies: " . $from->getAbbreviation() . "->" . $to->getAbbreviation() . ".");
        }

        return $this->rates[$key];
    }
}
