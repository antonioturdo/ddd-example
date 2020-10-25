<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * TransactionTest.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class TransactionTest extends TestCase
{
    public function testCannotBeCreatedWithNegativeCustomerID(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        new Transaction(-1, new \DateTime(), new Amount(0.0, Currency::EUR()));
    }

    public function testCannotBeCreatedWithFutureDate(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        new Transaction(1, (new \DateTime())->modify('+1 hour'), new Amount(0.0, Currency::EUR()));
    }

    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(Transaction::class, new Transaction(1, new \DateTime(), new Amount(0.0, Currency::EUR())));
    }
}
