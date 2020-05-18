<?php

namespace Classes\Tests;

use Classes\TransactionCommission;
use Classes\Tools\Caches;
use PHPUnit\Framework\TestCase;

class TransactionCommissionTest extends TestCase
{
    /**
     * Test SaveAdvertiser
     * @dataProvider providerCommission
     * @param array $values
     * @param array $expected
     */
    public function testCommission($values, $expected)
    {
        $stub = $this->createPartialMock(TransactionCommission::class, ['getRate', 'binInfo']);
        $stub->bin = $values["bin"];
        $stub->amount = $values["amount"];
        $stub->currency = $values["currency"];

        $stub->method('getRate')
            ->willReturn(1);
        $stub->method('binInfo')
            ->willReturn(["country" => ["alpha2" => "DK"]]);

        $cache = new Caches();

        $this->assertEquals($expected, $stub->commission([], $cache));
    }

    public function providerCommission()
    {
        return [
            [["bin" => "45717360", "amount" => "100.00", "currency" => "EUR"], 1],
            [["bin" => "516793", "amount" => "50.00", "currency" => "USD"], 0.5],
            [["bin" => "45417360", "amount" => "10000.00", "currency" => "JPY"], 100],
            [["bin" => "41417360", "amount" => "130.00", "currency" => "USD"], 1.3],
            [["bin" => "4745030", "amount" => "20000.00", "currency" => "GBP"], 200],
        ];
    }
}