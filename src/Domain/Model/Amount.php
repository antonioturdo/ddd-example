<?php

namespace AntonioTurdo\DDDExample\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Currency;

/**
 * Value object to model a monetary amount
 *
 * @author aturdo
 */
class Amount {
    
    /** @var float */
    private $value;
    
    /** @var Currency */
    private $currency;
    
    public function __construct(float $value, Currency $currency) {
        $this->value = $value;
        $this->currency = $currency;
    }
    
    public function getValue(): float {
        return $this->value;
    }

    public function getCurrency(): Currency {
        return $this->currency;
    }
    
    public function __toString() {
        return $this->currency." ".$this->value;
    }

}
