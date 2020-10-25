<?php

namespace AntonioTurdo\DDDExample\Tests\Domain\Service;

use AntonioTurdo\DDDExample\Application\Request\TransactionsReportRequest;
use PHPUnit\Framework\TestCase;

/**
 * TransactionsReportValidatorTest.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class TransactionsReportValidatorTest extends TestCase
{
    private function getValidator()
    {
        return new \AntonioTurdo\DDDExample\Application\Validator\TransactionsReportValidator();
    }

    public function testInvalidCurrency(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        $this->getValidator()->validate(new TransactionsReportRequest('1', 'EUS'));
    }

    public function testInvalidCustomerID(): void
    {
        $this->expectException(\UnexpectedValueException::class);

        $this->getValidator()->validate(new TransactionsReportRequest('A', 'EUR'));
    }

    public function testValid(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getValidator()->validate(new TransactionsReportRequest('1', 'EUR'));
    }
}
