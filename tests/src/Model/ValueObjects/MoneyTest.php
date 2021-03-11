<?php

namespace Tests\Model\ValueObjects;

use App\Model\ValueObjects\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testValidMoney()
    {
        $money = Money::build([
            'amount' => 200.00,
            'currency' => 'BRL'
        ]);
        
        static::assertEquals(200.00, $money->getAmount()->getValue());
    }
    
    public function testAddValue()
    {
        $money = Money::build([
            'amount' => 200.00,
            'currency' => 'BRL'
        ]);

        $moneyToAdd = Money::build([
            'amount' => 50.00,
            'currency' => 'BRL'
        ]);
        
        $result = $money->add($moneyToAdd);
        
        static::assertEquals(250.00, $result->getAmount()->getValue());

    }
    
    public function testSubValue()
    {
        $money = Money::build([
            'amount' => 200.00,
            'currency' => 'BRL'
        ]);

        $moneyToSub = Money::build([
            'amount' => 50.00,
            'currency' => 'BRL'
        ]);

        $result = $money->sub($moneyToSub);

        static::assertEquals(150.00, $result->getAmount()->getValue());
    }
}