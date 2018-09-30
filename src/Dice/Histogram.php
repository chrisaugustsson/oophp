<?php

namespace Anax\Dice;

/**
 * Class for Histogram
 */
class Histogram
{
    /**
     * @var array $serie    The numbers stored in sequence
     * @var int $min        The lowest possible number
     * @var int $max        The highest possible number
     */
    private $serie = [];
    private $histogram = [];

    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }


    public function __construct(int $min = 1, int $max = 6)
    {
        for ($i=$min; $i <= $max; $i++) {
            $this->histogram[$i] = "";
        }
    }

    /**
     * Return a string with a texutal rep. of the
     * histogram
     *
     * @return string representing the histogram
     */
    public function getAsText()
    {
        $histogramAsString = "";

        foreach ($this->histogram as $key => $value) {
            $histogramAsString .= $key . ": " . $value . "\n";
        }

        return $histogramAsString;
    }

    /**
     * Creates the histogram
     */
    public function createHistogram()
    {
        foreach ($this->getSerie() as $number) {
            $this->histogram[$number] .= "*";
        }
    }

    /**
     * Inject the object to use as base for histogram data.
     *
     * @param HistogramInterace $object     The object holding the serie.
     *
     * @return void.
     */
    public function injectData(HistogramInterface $object)
    {
        $this->serie = $object->getHistogramSerie();
        $this->createHistogram();
    }
}
