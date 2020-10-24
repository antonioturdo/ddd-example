<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Service;

use AntonioTurdo\DDDExample\Domain\Service\IExchangeRateProvider;
use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;

use CurrencyConverter\CurrencyConverter;

/**
 * Description of WSExchangeRateProvider
 *
 * @author aturdo
 */
class WSExchangeRateProvider implements IExchangeRateProvider {

    public function getExchangeRate(Currency $fromCurrency, Currency $toCurrency): float {
        $converter = new CurrencyConverter();
        
        $cacheAdapter = new \CurrencyConverter\Cache\Adapter\FileSystem(__DIR__ . '/../../../cache/');
        $cacheAdapter->setCacheTimeout(\DateInterval::createFromDateString('60 second'));
        $converter->setCacheAdapter($cacheAdapter);
        
        return $converter->convert($fromCurrency->getKey(), $toCurrency->getKey());        
    }

}
