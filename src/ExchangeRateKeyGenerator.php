<?php


namespace JakubTheDeveloper\Exchange;

class ExchangeRateKeyGenerator
{
    /**
     * @param Currency $from
     * @param Currency $to
     * @return string
     */
    public static function generate(Currency $from, Currency $to): string
    {
        return $from->getKey() . "_" . $to->getKey();
    }
}
