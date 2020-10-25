<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use PHPUnit\Framework\TestCase;

/**
 * AmountTest.
 *
 * @author aturdo
 */
class AmountTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(Amount::class, new Amount(0.0, Currency::EUR()));
    }
    
    public function testToString(): void
    {
        $this->assertEquals('€ 10.00', new Amount(10, Currency::EUR()));
    }
}
