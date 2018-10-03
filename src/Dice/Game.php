<?php
namespace Anax\Dice;

/**
 * Controller class Game for DiceGame
 */
class Game
{

    /**
     * @var array $players       The players in the game
     * @var array $dices         All the dices in the game
     * @var object $round        Current round
     * @var int $currentPlayer   The current player as integer
     * @var string $stage        The current stage of the game
     * @var int $startingPlayer  The starting player
     * @var array $roundData     Data for the current round.
     * @var array $rollHistory   Keeps history if the past rolls conained any 1's.
     * @var boolean $goodToGo    Must be true in order for the bot to make a roll.
     */
    private $players = [];
    private $dices = [];
    private $round;
    private $currentPlayer;
    private $stage;
    private $startingPlayer;
    public $roundData = [0, 0, 0];
    private $rollHistory = [];
    public $goodToGo = true;
    private $histogram;

    /**
     * Constructor to initiate a new game. If previus game is started, number of players will be passed
     * along with the player score. Each index of the array represent one player. Human players allways
     * comes first, then AI players.
     *
     * @param int @nrOfPlayers      The number of human players in the game. Default value set to one.
     * @param int @nrOfAiPlayers    The number of AI players in the game. Default value set to one.
     *
     */
    public function __construct(int $nrOfPlayers = 1, int $nrOfAiPlyers = 1, int $nrOfDices = 5)
    {
        for ($i=0; $i < $nrOfPlayers; $i++) {
            array_push($this->players, new Player());
        }

        for ($i=0; $i < $nrOfAiPlyers; $i++) {
            array_push($this->players, new AiPlayer());
        }

        for ($i=0; $i < $nrOfDices; $i++) {
            array_push($this->dices, new Dice());
        }

        $this->currentPlayer = 1;
        $this->stage = "pre";
        $this->histogram = new Histogram();
    }


    /**
     * Returns the players
     * @return array as players.
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Detirmens who gets to start.
     */
    public function whoStarts()
    {
        $temp = 0;
        foreach ($this->players as $key => $player) {
            if ($player->getScore() >= $temp) {
                $startingPlayer = $key;
                $temp = $player->getScore();
            }
        }

        $this->startingPlayer = $startingPlayer + 1;
    }

    /**
     * Returns the starting player.
     * @return int as the starting player
     */
    public function getStartingPlayer()
    {
        return $this->startingPlayer;
    }

    /**
     * Returns the current player.
     * @return Player as current player.
     */
    public function getCurrentPlayer()
    {
        return $this->players[$this->currentPlayer-1];
    }


    /**
     * Starts new round. Creates a new instance of Round.
     */
    public function startNewRound()
    {
        $this->round = new Round();
        $this->goodToGo = true;
        $this->roundData = [0, 1, 0];
    }

    /**
     * Starts the game
     */
    public function startGame()
    {
        for ($i=0; $i < count($this->players); $i++) {
            $this->players[$i]->resetScore();
        }
        $this->stage = "started";
        $this->currentPlayer = $this->startingPlayer;
        $this->startNewRound();
    }

    /**
     * Returns histogram
     *
     * @return string of the histogram
     */
    public function getHistogram()
    {
        return $this->histogram->getAsText();
    }

    /**
     * Increments current player with one to pass the turn to next player.
     * If it's the last players turn, passes it back to the first player.
     */
    public function nextPlayer()
    {
        $this->getCurrentPlayer()->setScore($this->roundData[2]);
        if ($this->getCurrentPlayer()->getScore() >= 100) {
            $this->stage = "winner";
        } else {
            $this->startNewRound();
            if ($this->currentPlayer < count($this->players)) {
                $this->currentPlayer += 1;
            } else {
                $this->currentPlayer = 1;
            }
        }
    }

    /**
     * Makes throw
     */
    public function makeHand()
    {
        if ($this->stage === "pre") {
            $hand = new Hand([$this->dices[0]]);
            $hand->roll();
            $this->players[$this->currentPlayer-1]->setScore($hand->values()[0]);
            $this->currentPlayer += 1;
        }
        if ($this->stage === "pre" && $this->currentPlayer === sizeOf($this->players)+1) {
            $this->stage = "begin";
            $this->whoStarts();
        }
        if ($this->stage === "started") {
            $hand = new Hand($this->dices);
            $hand->roll();
            $this->histogram->injectData($hand);
            $this->roundData = $this->round->evaluateRoll($hand->values());
            array_push($this->rollHistory, $this->roundData[1]);
        }
    }

    /**
     * Makes the roll for the AI player
     */
    public function botRoll()
    {
        $player = $this->getCurrentPlayer();
        if ($player->makeHand($this->rollHistory, $this->roundData[2]) && $this->goodToGo) {
            $this->makeHand();
            $this->goodToGo = end($this->rollHistory) !== 0;
        } else {
            $this->nextPlayer();
        };
    }

    /**
     * Sets goodToGo to false
     */
    public function setGoodToGo()
    {
        $this->goodToGo = false;
    }

    /**
     * Returns the current player.
     * @return int as current player.
     */
    public function currentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * Returns the current stage of the game.
     * @return string as current stage.
     */
    public function getStage()
    {
        return $this->stage;
    }
}
