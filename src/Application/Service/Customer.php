<?php

namespace AntonioTurdo\DDDExample\Application\Service;

use AntonioTurdo\DDDExample\Application\DTO\TransactionsReport;
use AntonioTurdo\DDDExample\Application\Request\TransactionsReportRequest;
use AntonioTurdo\DDDExample\Application\Validator\TransactionsReportValidator;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Service\CurrencyConverter;
use AntonioTurdo\DDDExample\Domain\Service\IEntityManager;

/**
 * Exposes use cases about a Customer.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class Customer
{
    /** @var IEntityManager */
    private $entityManager;

    /** @var CurrencyConverter */
    private $currencyConverter;

    /** @var TransactionsReportValidator */
    private $transactionsReportValidator;

    public function __construct(IEntityManager $entityManager, CurrencyConverter $currencyConverter, TransactionsReportValidator $transactionsReportValidator)
    {
        $this->entityManager = $entityManager;
        $this->currencyConverter = $currencyConverter;
        $this->transactionsReportValidator = $transactionsReportValidator;
    }

    /**
     * Return the transactions report for the customer with the given id.
     *
     * @param TransactionsReportRequest $request
     *
     * @return TransactionsReport
     */
    public function transactionsReport(TransactionsReportRequest $request): TransactionsReport
    {
        // validate request
        $this->transactionsReportValidator->validate($request);

        // fetch data
        $repository = $this->entityManager->getRepository(Transaction::class);
        $transactions = $repository->getTransactionsByCustomer((int) $request->getCustomerID());

        $currency = Currency::{$request->getCurrencyCode()}();

        // build report
        $report = new TransactionsReport();

        foreach ($transactions as $transaction) {
            $report->addConvertedTransaction(new Transaction($transaction->getCustomerID(), $transaction->getDate(), $this->currencyConverter->convert($transaction->getValue(), $currency)));
        }

        return $report;
    }
}
