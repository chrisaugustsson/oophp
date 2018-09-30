<?php
namespace Anax\Dice;

/**
 * Player class for AI player
 */
class AiPlayer extends Player
{
    /**
     * @var int $score      Current score.
     * @var string $TYPE    The type of player.
     */
    private $score;
    const TYPE = "AI";

    /**
     * Construts an instance of AI player. Calls constructor of parent class Player.
     * Takes one argument to keep track of score.
     *
     * @param int $score    The current score. Default value 0.
     */
    public function __construct(int $score = 0)
    {
        $this->score = $score;
    }


    /**
     * Returns the type of player
     * @return string as the type of player
     */
    public function getType()
    {
        return self::TYPE;
    }

    /**
     * Determine if the bot should make a roll or not.
     * @return boolean
     */
    public function makeHand(array $rollHistory, int $score)
    {
        $temp = 0;
        foreach ($rollHistory as $roll) {
            if ($roll === 0) {
                $temp += 1;
            } else {
                $temp = 0;
            }
        }

        if ($score < 40) {
            return true;
        }

        if ($score > 40 && $temp > 1) {
            return true;
        }

        return false;
    }
}
