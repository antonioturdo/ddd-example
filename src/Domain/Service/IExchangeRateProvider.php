<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Model\Currency;

/**
 * Interface to an exchange rate provider
 * 
 * @author aturdo
 */
interface IExchangeRateProvider {
    
    public function getExchangeRate(Currency $fromCurrency, Currency $toCurrency): float;
}
