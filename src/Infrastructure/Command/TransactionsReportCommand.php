<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use AntonioTurdo\DDDExample\Application\Service\Customer;

/**
 * Command that allows to obtain transactions report about a customer in console
 *
 * @author aturdo
 */
class TransactionsReportCommand extends Command {
    
    protected static $defaultName = 'transactions:report';
    
    /** @var Customer */
    private $customerService;
    
    public function __construct(Customer $customerService) {
        $this->customerService = $customerService;
        
        parent::__construct();
    }

    protected function configure()
    {
    $this
        ->addArgument('customerID', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
        ->setDescription('Print a simple transactions report')
        ->setHelp('Print a list with all the transactions of the customer with given id');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $customerID = $input->getArgument('customerID');
        
        if (!is_string($customerID) || !preg_match("/^\d+$/", $customerID)) {
            throw new \RuntimeException("customerID argument must be an integer");
        }
            
        $transactionsReport =  $this->customerService->transactionsReport((int) $customerID);

        foreach ($transactionsReport->getConvertedTransactions() as $transaction) {
            $output->writeln("Date: ".$transaction->getDate()->format("Y-m-d"). " - Amount in EUR: ". $transaction->getValue()); 
        }
    }
}
