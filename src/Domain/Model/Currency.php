<?php

namespace AntonioTurdo\DDDExample\Domain\Model;

use MyCLabs\Enum\Enum;

/**
 * Currency enumeration.
 *
 * Keys are ISO_4217 codes, values are display strings
 *
 * @author aturdo
 */
final class Currency extends Enum
{
    private const USD = '$';
    private const EUR = '€';
    private const GBP = '£';

    public function getSignificantDecimalDigits()
    {
        $significationDecimalDigits = [
            self::USD()->getKey() => 2,
            self::EUR()->getKey() => 2,
            self::GBP()->getKey() => 2,
        ];

        return $significationDecimalDigits[$this->getKey()];
    }
}
