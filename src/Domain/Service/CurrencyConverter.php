<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;

/**
 * Service to convert an amount in a given currency.
 * Depends on an exchange rate provider.
 *
 * @author aturdo
 */
class CurrencyConverter {
    
    /** @var IExchangeRateProvider */
    private $exchangeRateProvider;
    
    public function __construct(IExchangeRateProvider $exchangeRateProvider) {
        $this->exchangeRateProvider = $exchangeRateProvider;
    }
    
    public function convert(Amount $amount, Currency $toCurrency): Amount {
        if ($amount->getCurrency()->getKey() === $toCurrency->getKey()) {
            return new Amount($amount->getValue(), $toCurrency);
        }
        
        $ratio = $this->exchangeRateProvider->getExchangeRate($amount->getCurrency(), $toCurrency);
        
        $convertedValue = $ratio * $amount->getValue();
        return new Amount($convertedValue, $toCurrency);        
    }
}
