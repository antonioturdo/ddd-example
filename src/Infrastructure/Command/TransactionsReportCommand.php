<?php

namespace AntonioTurdo\DDDExample\Infrastructure\Command;

use AntonioTurdo\DDDExample\Application\Service\Customer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command that allows to obtain transactions report about a customer in console.
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class TransactionsReportCommand extends Command
{
    protected static $defaultName = 'transactions:report';

    /** @var Customer */
    private $customerService;

    public function __construct(Customer $customerService)
    {
        $this->customerService = $customerService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
        ->addArgument('customerID', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
        ->addOption('currency', null, \Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Report currency', 'EUR')
        ->setDescription('Print a simple transactions report')
        ->setHelp('Print a list with all the transactions of the customer with given id');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $customerID = $input->getArgument('customerID');

        if (!is_string($customerID)) {
            throw new \RuntimeException('customerID argument must be a scalar string');
        }

        $request = new \AntonioTurdo\DDDExample\Application\Request\TransactionsReportRequest($customerID, $input->getOption('currency'));

        $transactions = $this->customerService->transactionsReport($request)->getConvertedTransactions();

        foreach ($transactions as $transaction) {
            $output->writeln('Date: '.$transaction->getDate()->format('Y-m-d').' - Amount converted: '.$transaction->getValue());
        }

        if (count($transactions) === 0) {
            $output->writeln('No transactions found!');
        }
    }
}
