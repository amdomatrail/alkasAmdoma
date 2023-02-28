<?php
use PHPUnit\Framework\testCase;
class CalcTest extends TestCase
{
    public function testTrueOrDare()
    {
        $action = true;
        $this->assertTrue($action);
    }
}