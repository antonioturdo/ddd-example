<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Currency;

use PHPUnit\Framework\TestCase;

/**
 * Description of CurrencyTest
 *
 * @author aturdo
 */
class CurrencyTest extends TestCase {

    public function testCannotBeCreatedFromInvalidSymbol(): void {
        $this->expectException(\UnexpectedValueException::class);
        
        $this->assertInstanceOf(Currency::class, new Currency("Z"));
    } 
    
    public function testCanBeCreated(): void {
        $this->assertInstanceOf(Currency::class, new Currency("€"));
    }  
}
