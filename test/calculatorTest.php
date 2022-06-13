<?php
require __DIR__ . "/../calculator.php";

class CalculatorTest extends \PHPUnit\Framework\TestCase{
    public function testadd(){
        $calculator = new \Calculator();
        $calculator->add('a', 2);
    }
}