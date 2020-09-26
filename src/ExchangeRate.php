<?php


namespace JakubTheDeveloper\Exchange;

class ExchangeRate
{
    /** @var Currency */
    private Currency $from;

    /** @var Currency */
    private Currency $to;

    /** @var float */
    private float $rate;

    /** @var int */
    private int $precision;

    /**
     * ExchangeRate constructor.
     * @param Currency $from
     * @param Currency $to
     * @param float $rate
     * @param int $precision
     */
    public function __construct(Currency $from, Currency $to, float $rate, int $precision)
    {
        $this->from = $from;
        $this->to = $to;
        $this->rate = $rate;
        $this->precision = $precision;
    }

    /**
     * @return Currency
     */
    public function getFrom(): Currency
    {
        return $this->from;
    }

    /**
     * @return Currency
     */
    public function getTo(): Currency
    {
        return $this->to;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return ExchangeRateKeyGenerator::generate(
            $this->getFrom(),
            $this->getTo()
        );
    }

    /**
     * @return int
     */
    public function getPrecision(): int
    {
        return $this->precision;
    }
}
