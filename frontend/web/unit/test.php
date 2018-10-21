<?php

namespace test;

include_once 'calcalator.php';

class CalculatorTest
{
    public function __construct()
    {
        self::testAddCorrect();
    }

    public static function testAddCorrect()
    {
        echo 'Running ' . __METHOD__ . '<br>';

        $result = Calcalator::add(10, 5);
        if ($result === 15) {
            echo 'Passed';
        } else {
            echo "Failed: expected (integer) 15. Result: (". gettype($result) . ") $result";
        }
        echo "<hr>";
    }
}

new CalculatorTest();