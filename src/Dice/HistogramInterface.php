<?php

namespace Anax\Dice;

/**
 * A interface for a classes supporting histogram reports.
 */
interface HistogramInterface
{
    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie();
}
