<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Repository;

use AntonioTurdo\DDDExample\Domain\Repository\ITransactionRepository;
use AntonioTurdo\DDDExample\Domain\Model\Amount;
use AntonioTurdo\DDDExample\Domain\Model\Transaction;
use AntonioTurdo\DDDExample\Domain\Model\Currency;
use AntonioTurdo\DDDExample\Infrastructure\Service\CSVParser;

/**
 * Description of CSVTransactionRepository
 *
 * @author aturdo
 */
class CSVTransactionRepository implements ITransactionRepository {
    
    private $csvParser;
    
    public function __construct(CSVParser $csvParser) {
       $this->csvParser = $csvParser;
    }
    
    public function getTransactionsByCustomer(int $customerID) {
        $transactions = [];
        
        foreach ($this->csvParser->parse(__DIR__."/../../../data.csv") as $data) {
            if (count($data) < 3) {
                throw new \RuntimeException("CSV must have 3 values per line");
            }

            if (!preg_match("/^\d+$/", $data[0])) {
                throw new \RuntimeException("Invalid customer ID: ".$data[0]);
            }

            if (((int) $data[0]) === $customerID) {
                $matches = [];

                if (!preg_match("/(*UTF8)(.)(\d+\.\d)/", $data[2], $matches)) {
                    throw new \RuntimeException("Invalid amount: ".$data[2]);
                }

                $amount = new Amount($matches[2], new Currency($matches[1]));
                
                $date = new \DateTime($data[1]);
                
                if ($date === false) {
                    throw new \RuntimeException("Invalid date: ".$data[1]);
                }
                
                $transactions[] = new Transaction($customerID, $date, $amount);
            }
        }
                
        return $transactions;
    }

}
