<?php

namespace AntonioTurdo\DDDExample\Domain\Model;

use AntonioTurdo\DDDExample\Domain\Model\Amount;

/**
 * Model a single transaction
 *
 * @author aturdo
 */
class Transaction {
    
    /** @var int */
    private $customerID;
    
    /** @var \DateTimeInterface */
    private $date;
    
    /** @var Amount */
    private $value;
    
    public function __construct(int $customerID, \DateTimeInterface $date, Amount $value) {
        if ($customerID <= 0) {
            throw new \UnexpectedValueException("Customer ID cannot be negative");
        }        
        
        if ($date > new \DateTime()) {
            throw new \UnexpectedValueException("Transaction date cannot be in the future");
        }
        
        $this->customerID = $customerID;
        $this->date = $date;
        $this->value = $value;
    }
    
    public function getCustomerID(): int {
        return $this->customerID;
    }
    
    public function getDate(): \DateTimeInterface {
        return $this->date;
    }

    public function getValue(): Amount {
        return $this->value;
    }
    
}
