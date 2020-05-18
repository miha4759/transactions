<?php
require_once __DIR__ . '/vendor/autoload.php';

use Classes\Tools\FileReader;
use Classes\Tools\Caches;
use Classes\TransactionCommission;

$fileName = $argv[1];
$fileReader = new FileReader();
$fileReader->read($fileName);
$transactionList = $fileReader->getJsonDecoded();

$rates = TransactionCommission::getRates();

$cache = new Caches();

foreach ($transactionList as $item) {
    $transaction = new TransactionCommission($item);
    print $transaction->commission($rates, $cache) . PHP_EOL;
}