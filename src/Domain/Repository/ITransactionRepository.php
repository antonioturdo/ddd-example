<?php

namespace AntonioTurdo\DDDExample\Domain\Repository;

/**
 * Inteface for the transaction repository.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
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
