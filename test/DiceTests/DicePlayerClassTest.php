<?php

namespace Anax\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test case for Player and AIPlayer class
 */
class DicePlayerClassTest extends TestCase
{
    public function testMakeHand()
    {
        $game = new Game(0, 2);
        $player = $game->getCurrentPlayer();
        $under40 = $player->makeHand([0, 0, 0], 30);
        $over40under60 = $player->makeHand([0, 0, 0], 50);
        $false = $player->makeHand([1, 1, 1], 2000);


        $this->assertEquals(false, $false);
        $this->assertEquals(true, $over40under60);
        $this->assertEquals(true, $under40);
    }
}
