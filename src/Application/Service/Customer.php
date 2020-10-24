<?php

namespace AntonioTurdo\DDDExample\Application\Service;

use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use AntonioTurdo\DDDExample\Application\DTO\TransactionsReport;
use AntonioTurdo\DDDExample\Domain\Service\IEntityManager;
use AntonioTurdo\DDDExample\Domain\Service\CurrencyConverter;

/**
 * Exposes the functionalities made available by the application about a Customer
 *
 * @author aturdo
 */
class Customer {
    
    /** @var IEntityManager */
    private $entityManager;
    
    /** @var ICurrencyConverter */
    private $currencyConverter;
    
    public function __construct(IEntityManager $entityManager, CurrencyConverter $currencyConverter) {
        $this->entityManager = $entityManager;
        $this->currencyConverter = $currencyConverter;
    }

    /**
     * Return the transactions report for the customer with the given id
     * 
     * @param int $customerID
     * @return TransactionsReport
     */
    public function transactionsReport(int $customerID): TransactionsReport {        
        $repository = $this->entityManager->getRepository(Transaction::class);
        
        $transactions = $repository->getTransactionsByCustomer($customerID);
        
        $report = new TransactionsReport();

        $eur = new Currency("€");

        foreach ($transactions as $transaction) {
            $report->addConvertedTransaction(new Transaction($transaction->getCustomerID(), $transaction->getDate(), $this->currencyConverter->convert($transaction->getValue(), $eur)));
        }        
        
        return $report;
    }
}
