<?php

namespace AntonioTurdo\DDDExample\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;

/**
 * Service to convert an amount in a given currency.
 * Depends on an exchange rate provider.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class CurrencyConverter
{
    /** @var IExchangeRateProvider */
    private $exchangeRateProvider;

    public function __construct(IExchangeRateProvider $exchangeRateProvider)
    {
        $this->exchangeRateProvider = $exchangeRateProvider;
    }

    /**
     * Convert the given Amount object in another one with a different currency
     * using the current exchange rate between origin and destination currencies.
     *
     * @param Amount   $amount
     * @param Currency $toCurrency
     *
     * @return Amount
     */
    public function convert(Amount $amount, Currency $toCurrency): Amount
    {
        if ($amount->getCurrency()->getKey() === $toCurrency->getKey()) {
            return new Amount($amount->getValue(), $toCurrency);
        }

        $ratio = $this->exchangeRateProvider->getExchangeRate($amount->getCurrency(), $toCurrency);

        $convertedValue = round($ratio * $amount->getValue(), $toCurrency->getSignificantDecimalDigits());

        return new Amount($convertedValue, $toCurrency);
    }
}
