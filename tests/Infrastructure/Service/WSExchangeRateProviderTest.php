<?php

namespace AntonioTurdo\DDDExample\Tests\Infrastructure\Service;

use AntonioTurdo\DDDExample\Domain\Model\Currency;

use PHPUnit\Framework\TestCase;

/**
 * WSExchangeRateProviderTest
 *
 * @author aturdo
 */
class WSExchangeRateProviderTest extends TestCase {
    
    private function getProvider() {
        return new \AntonioTurdo\DDDExample\Infrastructure\Service\WSExchangeRateProvider();       
    }
    
    public function testExchangeRateSameCurrency(): void {
        $currency = new Currency("€");
        
        $exchangeRate = $this->getProvider()->getExchangeRate($currency, $currency);
        
        $this->assertEquals(1, $exchangeRate);
    } 
    
    public function testExchangeRatePositive(): void {
        $fromCurrency = new Currency("€");
        $toCurrency = new Currency("$");
        
        $exchangeRate = $this->getProvider()->getExchangeRate($fromCurrency, $toCurrency);
        
        $this->assertGreaterThanOrEqual(0, $exchangeRate);
    }    
}
