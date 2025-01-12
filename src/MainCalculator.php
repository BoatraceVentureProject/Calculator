<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

/**
 * @author shimomo
 */
class MainCalculator
{
    /**
     * @param  array  $arguments
     * @return float
     */
    public function median(array $arguments): float
    {
        if (($count = count($arguments)) === 0) {
            return 0.0;
        }

        sort($arguments);

        $middle = floor(($count - 1) / 2);

        if ($count % 2) {
            return $arguments[$middle];
        }

        return (float) ($arguments[$middle] + $arguments[$middle + 1]) / 2;
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function average(array $arguments): float
    {
        if (($count = count($arguments)) === 0) {
            $count = 1.0;
        }

        return (float) (array_sum($arguments) / $count);
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function variance(array $arguments): float
    {
        $variance = 0.0;

        if (count($arguments) === 0) {
            return $variance;
        }

        foreach ($arguments as $argument) {
            $variance += pow($argument - $this->average($arguments), 2);
        }

        return (float) ($variance / count($arguments));
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function standardDeviation(array $arguments): float
    {
        return (float) sqrt($this->variance($arguments));
    }

    /**
     * @param  float  $value
     * @return float
     */
    public function reciprocal(float $value): float
    {
        return $value ? 1 / $value : 0.0;
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function syntheticOdds(array $arguments): float
    {
        $syntheticOdds = 0.0;

        foreach ($arguments as $argument) {
            $syntheticOdds += $this->reciprocal($argument);
        }

        return $this->reciprocal($syntheticOdds);
    }
}
