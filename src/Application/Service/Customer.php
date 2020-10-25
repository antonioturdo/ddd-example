<?php

namespace AntonioTurdo\DDDExample\Application\Service;

use AntonioTurdo\DDDExample\Application\DTO\TransactionsReport;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Service\CurrencyConverter;
use AntonioTurdo\DDDExample\Domain\Service\IEntityManager;

/**
 * Exposes use cases about a Customer.
 *
 * @author aturdo
 */
class Customer
{
    /** @var IEntityManager */
    private $entityManager;

    /** @var CurrencyConverter */
    private $currencyConverter;

    public function __construct(IEntityManager $entityManager, CurrencyConverter $currencyConverter)
    {
        $this->entityManager = $entityManager;
        $this->currencyConverter = $currencyConverter;
    }

    /**
     * Return the transactions report for the customer with the given id.
     *
     * @param int $customerID
     *
     * @return TransactionsReport
     */
    public function transactionsReport(int $customerID): TransactionsReport
    {
        $repository = $this->entityManager->getRepository(Transaction::class);

        $transactions = $repository->getTransactionsByCustomer($customerID);

        $report = new TransactionsReport();

        $eur = Currency::EUR();

        foreach ($transactions as $transaction) {
            $report->addConvertedTransaction(new Transaction($transaction->getCustomerID(), $transaction->getDate(), $this->currencyConverter->convert($transaction->getValue(), $eur)));
        }

        return $report;
    }
}
