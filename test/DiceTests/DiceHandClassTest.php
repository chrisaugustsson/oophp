<?php

namespace Anax\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test case for Game class
 */
class DiceHandClassTest extends TestCase
{
    protected function setUp()
    {
        $dice = new Dice();
        $this->hand = new Hand([$dice]);
        $this->hand->roll();
    }

    /**
     * Test the sum function. Set upt class creates new instance of
     * Hand and Dice. Passes Dice as argument to Hand.
     * rand() function is set to return 2 in previus test file.
     */
    public function testSum()
    {
        $sum = $this->hand->sum();

        $this->assertEquals(2, $sum);
    }

    /**
     * Test average.
     */
    public function testAverage()
    {
        $average = $this->hand->average();

        $this->assertEquals(2, $average);
    }
}
