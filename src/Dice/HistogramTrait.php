<?php

namespace Anax\Dice;

/**
 * A trait implementing HistogramInterface
 */
trait HistogramTrait
{
    /**
     * @var array $serire   The numbers stored in sequence
     */
    private $values = [];

    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()
    {
        return $this->values;
    }
}
