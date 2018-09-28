<?php

namespace Anax\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test case for Game class
 */
class DiceRoundClassTest extends TestCase
{
    /**
     * Tests evaluateRoll().
     * If 1 is rolled, it should return 0. Else it returns 1.
     */
    public function testEvaluateRoll()
    {
        $round = new Round();
        $message = $round->evaluateRoll([1, 1, 1]);

        $this->assertEquals(0, $message[1]);

        $round = new Round();
        $message = $round->evaluateRoll([2, 2, 2]);

        $this->assertEquals(1, $message[1]);
    }
}
