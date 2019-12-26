<?php
use PHPUnit\Framework\TestCase;
class FooTest extends TestCase
{
    /**
    * 正确语法
    **/
    public function testPushAndPop()
    {
        $stack = !!1;
        if($stack){
            $stack = !!0 ? 1: 2;
        }else{
            $stack = 3;
        }
        $this->assertEquals(2, $stack);
    }
    
    /**
    * 不正确语法
    **/
    /*public function testPushAndPop()
    {
        $stack = !!1 ? ( !!0 ? 1: 2 ) : 3;
        $this->assertEquals(2, $stack);
    }*/
}