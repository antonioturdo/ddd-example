<?php

require_once __DIR__.'/bootstrap.php';

$service = $containerBuilder->get(\AntonioTurdo\DDDExample\Application\Service\Customer::class);
$transactionsReport = $service->transactionsReport($argv[1]);

foreach ($transactionsReport->getConvertedTransactions() as $transaction) {
    echo "Date: ".$transaction->getDate()->format("Y-m-d"). " - Amount in EUR: ". $transaction->getValue().PHP_EOL;
}

