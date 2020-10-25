<?php

namespace AntonioTurdo\DDDExample\Application\DTO;

use AntonioTurdo\DDDExample\Domain\Model\Transaction;

/**
 * A simple DTO to enclose report data.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class TransactionsReport
{
    /** @var array */
    private $convertedTransactions;

    public function __construct()
    {
        $this->convertedTransactions = [];
    }

    public function addConvertedTransaction(Transaction $transaction)
    {
        $this->convertedTransactions[] = $transaction;
    }

    public function getConvertedTransactions()
    {
        return $this->convertedTransactions;
    }
}
