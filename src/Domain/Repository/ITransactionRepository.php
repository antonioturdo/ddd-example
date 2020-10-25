<?php

namespace AntonioTurdo\DDDExample\Domain\Repository;

/**
 * Inteface for the transaction repository.
 *
 * @author aturdo
 */
interface ITransactionRepository extends IRepository
{
    /**
     * Returns all the transactions for the customer with the given ID.
     *
     * @param int $customerID
     */
    public function getTransactionsByCustomer(int $customerID);
}
