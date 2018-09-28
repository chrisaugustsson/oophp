<?php

namespace Anax\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test case for creating objects in Dice namespace
 */
class DiceCreateObjectTest extends TestCase
{
    /**
     * Creates a new instance of the game with no arguments.
     * Should give one Player and one AiPlayer.
     *
     */
    public function testCreateGameNoArguments()
    {
        $game = new Game();
        $players = $game->getPlayers();

        $expextedResult = 2;

        $nrOfPlayers = count($players);

        $this->assertInstanceOf(Player::class, $players[0]);
        $this->assertInstanceOf(AiPlayer::class, $players[1]);

        $this->assertEquals($expextedResult, $nrOfPlayers);
    }

    /**
     * Creates a new player and verifys that the score is set to zero
     */
    public function testCreatePlayer()
    {
        $player = new Player();
        $score = $player->getScore();
        $expextedResult = 0;
        $type = $player->getType();

        $this->assertEquals("human", $type);
        $this->assertInstanceOf("\Anax\Dice\Player", $player);
        $this->assertEquals($expextedResult, $score);
    }

        /**
     * Creates a new AIplayer and verifys that the score is set to zero
     */
    public function testCreateAiPlayer()
    {
        $player = new AiPlayer();
        $score = $player->getScore();
        $expextedResult = 0;
        $type = $player->getType();

        $this->assertEquals("AI", $type);
        $this->assertInstanceOf("\Anax\Dice\AiPlayer", $player);
        $this->assertEquals($expextedResult, $score);
    }

    /**
     * Creates a new Dice
     */
    public function testCreateDiceNoArguments()
    {
        function rand()
        {
            return 2;
        }
        $dice = new Dice();

        $this->assertInstanceOf(Dice::class, $dice);
        $this->assertEquals(2, $dice->roll());
        $this->assertEquals(2, $dice->getLastRoll());
    }

    /**
     * Test creating Hand class
     */
    public function testCreateHand()
    {
        $hand = new Hand();

        $this->assertInstanceOf(Hand::class, $hand);
    }

    /**
     * Test creating Round class
     */
    public function testCreateRound()
    {
        $round = new Round();
        $this->assertInstanceOf(Round::class, $round);
    }
}
