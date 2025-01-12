<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\Calculator;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class CalculatorTest extends PHPUnitTestCase
{
    /**
     * @return void
     */
    public function testCalculateMedian(): void
    {
        $this->assertSame(3.0, Calculator::median([5, 1, 3]));
        $this->assertSame(2.5, Calculator::median([5, 1, 3, 2]));
    }

    /**
     * @return void
     */
    public function testCalculateAverage(): void
    {
        $this->assertSame(3.0, Calculator::average([5, 1, 3]));
        $this->assertSame(2.75, Calculator::average([5, 1, 3, 2]));
    }

    /**
     * @return void
     */
    public function testCalculateVariance(): void
    {
        $this->assertSame(4.0, Calculator::variance([5, 2, 6, 1, 3, 4, 7]));
        $this->assertSame(4.0, Calculator::variance([5, 2, 6, 1, 3, 4, 7, 1, 4]));
    }

    /**
     * @return void
     */
    public function testCalculateStandardDeviation(): void
    {
        $this->assertSame(2.0, Calculator::standardDeviation([5, 2, 6, 1, 3, 4, 7]));
        $this->assertSame(2.0, Calculator::standardDeviation([5, 2, 6, 1, 3, 4, 7, 1, 4]));
    }

    /**
     * @return void
     */
    public function testCalculateReciprocal(): void
    {
        $this->assertSame(0.25, Calculator::reciprocal(4));
        $this->assertSame(0.125, Calculator::reciprocal(8));
    }

    /**
     * @return void
     */
    public function testCalculateSyntheticOdds(): void
    {
        $this->assertSame(8.0, Calculator::syntheticOdds([12.0, 24.0]));
        $this->assertSame(6.0, Calculator::syntheticOdds([12.0, 24.0, 24.0]));
    }
}
