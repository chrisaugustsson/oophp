<?php
namespace Anax\Dice;

/**
 * Player class
 */
class Player
{
    /**
     * @var int $score    The current score of the player+
     * @var string $type    The type of player
     */
    private $score = 0;
    const TYPE = "human";


    /**
     * Constructor to initiate a new player. If a current game exists, the score will passed to the
     * new player.
     *
     * @param int $score      Current score. Default value set to zero.
     *
     */
    public function __construct(int $score = 0)
    {
        $this->score = $score;
    }


    /**
     * Returns the player score.
     * @return int as the current score.
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Sets the score of the player
     */
    public function setScore(int $score)
    {
        $this->score += $score;
    }

    /**
     * Sets the score of the player
     */
    public function resetScore()
    {
        $this->score = 0;
    }

    /**
     * Returns the type of the player
     * @return string as the type of player
     */
    public function getType()
    {
        return self::TYPE;
    }
}
