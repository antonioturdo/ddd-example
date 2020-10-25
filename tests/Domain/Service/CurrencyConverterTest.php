<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Service;

use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use PHPUnit\Framework\TestCase;

/**
 * CurrencyConverterTest.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class CurrencyConverterTest extends TestCase
{
    private function getConverter()
    {
        $exchangeRateProvider = new \AntonioTurdo\DDDExample\Infrastructure\Service\WSExchangeRateProvider();

        return new \AntonioTurdo\DDDExample\Domain\Service\CurrencyConverter($exchangeRateProvider);
    }

    public function testConvertToSameCurrency(): void
    {
        $value = 3.31;
        $currency = new Currency('€');

        $convertedAmount = $this->getConverter()->convert(new Amount($value, $currency), $currency);

        $this->assertEquals($value, $convertedAmount->getValue());
    }

    public function testConvertZero(): void
    {
        $value = 0.00;
        $fromCurrency = new Currency('€');
        $toCurrency = new Currency('$');

        $convertedAmount = $this->getConverter()->convert(new Amount($value, $fromCurrency), $toCurrency);

        $this->assertEquals($value, $convertedAmount->getValue());
    }

    public function testConvertPositive(): void
    {
        $value = 1.00;
        $fromCurrency = new Currency('€');
        $toCurrency = new Currency('$');

        $convertedAmount = $this->getConverter()->convert(new Amount($value, $fromCurrency), $toCurrency);

        $this->assertGreaterThanOrEqual(0, $convertedAmount->getValue());
    }

    public function testConvertNegative(): void
    {
        $value = -1.00;
        $fromCurrency = new Currency('€');
        $toCurrency = new Currency('$');

        $convertedAmount = $this->getConverter()->convert(new Amount($value, $fromCurrency), $toCurrency);

        $this->assertLessThanOrEqual(0, $convertedAmount->getValue());
    }
}
