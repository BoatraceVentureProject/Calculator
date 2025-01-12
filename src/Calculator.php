<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use DI\Container;
use DI\ContainerBuilder;

/**
 * @author shimomo
 */
class Calculator
{
    /**
     * @var \Boatrace\Venture\Project\Calculator
     */
    protected static Calculator $instance;

    /**
     * @var \DI\Container
     */
    protected static Container $container;

    /**
     * @param  \Boatrace\Venture\Project\MainCalculator  $calculator
     * @return void
     */
    public function __construct(protected MainCalculator $calculator){}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return float
     */
    public function __call(string $name, array $arguments): float
    {
        return $this->calculator->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return float
     */
    public static function __callStatic(string $name, array $arguments): float
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @return \Boatrace\Venture\Project\Calculator
     */
    public static function getInstance(): Calculator
    {
        return self::$instance ?? self::$instance = (
            self::$container ?? self::$container = self::getContainer()
        )->get('Calculator');
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
        return $builder->build();
    }
}
