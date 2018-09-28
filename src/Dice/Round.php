<?php
namespace Anax\Dice;

class Round
{

    private $message;
    private $rolledOne = false;
    private $sum = 0;

    /**
     * Packs up all the values from the dices in an array.
     * Checks to see if any of the dices are showin a one.
     * @return array as the message and info about the rolls.
     */
    public function evaluateRoll(array $rolls)
    {
        $this->message = "You rolled ";
        foreach ($rolls as $roll) {
            if ($roll === 1) {
                $this->rolledOne = true;
            }
            $this->sum += $roll;
            $this->message .= $roll . " ";
        }

        if ($this->rolledOne) {
            return [
                $this->message,
                0,
                0
            ];
        }
        return [
            $this->message,
            1,
            $this->sum
        ];
    }
}
