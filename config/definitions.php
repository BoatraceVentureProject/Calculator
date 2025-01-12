<?php

declare(strict_types=1);

return [
    'Calculator' => \DI\create('\Boatrace\Venture\Project\Calculator')->constructor(
        \DI\get('MainCalculator')
    ),
    'MainCalculator' => function ($container) {
        return $container->get('\Boatrace\Venture\Project\MainCalculator');
    },
];
