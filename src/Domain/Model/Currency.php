<?php

namespace AntonioTurdo\DDDExample\Domain\Model;

use MyCLabs\Enum\Enum;

/**
 * Description of Currency
 *
 * @author aturdo
 */
class Currency extends Enum {
    
    private const USD = '$';
    private const EUR = '€';
    private const GBP = '£';
    
    
}
