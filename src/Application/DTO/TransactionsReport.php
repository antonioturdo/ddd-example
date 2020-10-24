<?php

namespace AntonioTurdo\DDDExample\Application\DTO;

use AntonioTurdo\DDDExample\Domain\Model\Transaction;

/**
 * Description of TransactionsReport
 *
 * @author aturdo
 */
class TransactionsReport {
    
    private $convertedTransactions;
    
    public function __construct() {
        $this->convertedTransactions = [];
    }

    public function addConvertedTransaction(Transaction $transaction) {
        $this->convertedTransactions[] = $transaction;
    }
    
    public function getConvertedTransactions() {
        return $this->convertedTransactions;
    }

}
