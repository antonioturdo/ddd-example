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
class Currency extends Enum {
    
    private const USD = '$';
    private const EUR = '€';
    private const GBP = '£';
    
    
}
