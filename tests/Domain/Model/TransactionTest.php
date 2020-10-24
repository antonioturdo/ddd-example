<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;

use PHPUnit\Framework\TestCase;

/**
 * Description of TransactionTest
 *
 * @author aturdo
 */
class TransactionTest extends TestCase {
    
    public function testCannotBeCreatedWithNegativeCustomerID(): void {
        $this->expectException(\UnexpectedValueException::class);
        
        new Transaction(-1, new \DateTime(), new Amount(0.0, new Currency("€")));
    }
    
    public function testCannotBeCreatedWithFutureDate(): void {
        $this->expectException(\UnexpectedValueException::class);
        
        new Transaction(1, (new \DateTime())->modify("+1 hour"), new Amount(0.0, new Currency("€")));
    } 
    
    public function testCanBeCreated(): void {
        $this->assertInstanceOf(Transaction::class, new Transaction(1, new \DateTime(), new Amount(0.0, new Currency("€"))));
    }     
    
}
