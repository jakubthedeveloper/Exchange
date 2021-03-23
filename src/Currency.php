<?php

namespace JakubTheDeveloper\Exchange;

class Currency
{
    /** @var string  */
    private string $abbreviation;

    /**
     * Currency constructor.
     * @param string $abbreviation
     */
    public function __construct(string $abbreviation)
    {
        $this->abbreviation = $abbreviation;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return strtolower($this->abbreviation);
    }

    /**
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }
}
