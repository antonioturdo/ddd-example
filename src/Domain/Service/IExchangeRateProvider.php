<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Model\Currency;

/**
 * Interface to an exchange rate provider.
 *
 * @author aturdo
 */
interface IExchangeRateProvider
{
    /**
     * Return the current exchange rate between two currencies.
     *
     * @param Currency $fromCurrency
     * @param Currency $toCurrency
     *
     * @return float
     */
    public function getExchangeRate(Currency $fromCurrency, Currency $toCurrency): float;
}
