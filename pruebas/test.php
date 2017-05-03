<?php
class test extends PHPUnit_Framework_testCase
 {
     public function testPushAndPop ()
     {
        $pila = [];
        $this->assertEquals( 0 , count($pila));

        array_push($pila,'foo' );
        $this->assertEquals('foo', $pila[count($pila) -1]);
        $this->assertEquals(1,count($pila));

        $this->assertEquals('foo',array_pop($pila));
        $this->assertEquals(0,count($pila));
    }
}
 