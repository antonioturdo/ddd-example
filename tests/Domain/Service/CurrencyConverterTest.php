<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;

use PHPUnit\Framework\TestCase;

/**
 * Description of CurrencyConverterTest
 *
 * @author aturdo
 */
class CurrencyConverterTest extends TestCase {
    
    public function testConvertToSameCurrency(): void {
        $this->expectException(\UnexpectedValueException::class);
        
        new Transaction(-1, new \DateTime(), new Amount(0.0, new Currency("€")));
    }    
    
}
