<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Repository;

use AntonioTurdo\DDDExample\Domain\Repository\ITransactionRepository;
use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Model\Currency;

/**
 * Description of CSVTransactionRepository
 *
 * @author aturdo
 */
class CSVTransactionRepository implements ITransactionRepository {
    
    public function getTransactionsByCustomer(int $customerID) {
        $handle = fopen(__DIR__."/../../../data.csv", "r");
        
        $transactions = [];
        
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if (((int) $data[0]) === $customerID) {
                $matches = [];
                preg_match("/(*UTF8)(.)(\d+\.\d)/", $data[2], $matches);
                $amount = new Amount($matches[2], new Currency($matches[1]));
                $transactions[] = new Transaction($customerID, new \DateTime($data[1]), $amount);
            }
        }
                
        return $transactions;
    }

}
