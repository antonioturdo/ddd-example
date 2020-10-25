<?php

namespace AntonioTurdo\DDDExample\Application\Request;

/**
 * Enclose data of the transactions report request
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class TransactionsReportRequest
{
    /** @var string */
    private $customerID;
    
    /** @var string */
    private $currencyCode;
    
    public function __construct(string $customerID, string $currencyCode)
    {
        $this->customerID = $customerID;
        $this->currencyCode = $currencyCode;
    }
    
    public function getCustomerID(): string
    {
        return $this->customerID;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

}
