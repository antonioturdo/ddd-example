<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Service;

use AntonioTurdo\DDDExample\Domain\Model\Currency;
use AntonioTurdo\DDDExample\Domain\Service\IExchangeRateProvider;
use CurrencyConverter\CurrencyConverter;

/**
 * Exchange rate provider implementation using a third-party library.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class WSExchangeRateProvider implements IExchangeRateProvider
{
    public function getExchangeRate(Currency $fromCurrency, Currency $toCurrency): float
    {
        if ($fromCurrency->getKey() === $toCurrency->getKey()) {
            return 1;
        }

        $converter = new CurrencyConverter();

        $cacheAdapter = new \CurrencyConverter\Cache\Adapter\FileSystem(__DIR__.'/../../../cache/');
        $cacheAdapter->setCacheTimeout(\DateInterval::createFromDateString('60 second'));
        $converter->setCacheAdapter($cacheAdapter);

        return $converter->convert($fromCurrency->getKey(), $toCurrency->getKey());
    }
}
