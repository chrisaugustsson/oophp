<?php

namespace Anax\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test case for Game class
 */
class DiceGameClassTest extends TestCase
{
    protected function setUp()
    {
        $_SESSION = [];
    }

    /**
     * Tests whoStarts.
     * Since both players roll the same. It should allways be the second player
     * that starts.
     */
    public function testWhoStarts()
    {
        $game = new Game();
        $game->whoStarts();

        $this->assertEquals(2, $game->getStartingPlayer());
    }

    /**
     * Test makeHand.
     */
    public function testMakeHand()
    {
        $game = new Game();
        $game->makeHand();

        $this->assertEquals(2, $game->currentPlayer());

        $game->makeHand();

        $this->assertEquals("begin", $game->getStage());
    }

    /**
     * Tests start the game. Should change game stage to Started.
     */
    public function testStartGame()
    {
        $game = new Game();
        $game->whoStarts();
        $game->startGame();
        $players = $game->getPlayers();

        $players[0]->setScore(200);
        $players[1]->setScore(200);

        $this->assertEquals("started", $game->getStage());
        $this->assertEquals(200, $players[0]->getScore());

        $game->makeHand();
    }


    /**
     * Test the nextPlayer function.
     */
    public function testNextPlayer()
    {
        $game = new Game();
        $currentPlayer = $game->currentPlayer();

        $this->assertEquals(1, $currentPlayer);

        $game->nextPlayer();
        $currentPlayer = $game->currentPlayer();

        $this->assertEquals(2, $currentPlayer);

        $game->nextPlayer();
        $currentPlayer = $game->currentPlayer();

        $this->assertEquals(1, $currentPlayer);
    }

    /**
     * Test the current player.
     */
    public function testCurrentPlayer()
    {
        $game = new Game();
        $currentPlayer = $game->getCurrentPlayer();

        $this->assertInstanceOf(Player::class, $currentPlayer);
    }

    /**
     * Tests the botRoll funktion.
     * Starts the game then makes the bot roll. Tests that the score
     * should be 10. Sum of 5 dices with the value of 2. (Rand function is
     * set to return 2 in previus test).
     * Changes to the human player that makes three succesful rolls and then
     * pass it back to AI, that sould return false, and pass the turn back
     * to human player.
     */
    public function testBotRoll()
    {
        $game = new Game(0, 2);
        $game->whoStarts();
        $game->startGame();
        $game->botRoll();
        $players = $game->getPlayers();

        $game->nextPlayer();
        $game->makeHand();
        $game->makeHand();
        $game->makeHand();
        $game->nextPlayer();
        $game->botRoll();

        $this->assertEquals(2, $game->currentPlayer());
        $this->assertEquals(20, $players[1]->getScore());

        $game->setGoodToGo();
        $game->botRoll();
    }
}
