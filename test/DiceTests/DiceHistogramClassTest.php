<?php

namespace Anax\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test case for Histogram
 */
class DiceHistogramClassTest extends TestCase
{
    public function testGetAsText()
    {
        $game = new Game();
        $histogram = $game->getHistogram();
        $excpected = "1: \n2: \n3: \n4: \n5: \n6: \n";
        $this->assertEquals($excpected, $histogram);
    }
}
