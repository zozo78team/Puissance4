<?php

declare(strict_types=1);

use Support\Factory;
use Support\Renderer;
use Support\Service;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'games' => [
        'connect4' => Service\ConnectFourGame::class,
    ],
    'service_manager' => [
        'factories' => [
            Renderer\Output::class => Factory\Renderer\Output::class,
            Service\ConnectFourGame::class => Factory\Service\ConnectFourGame::class,
            // InvokableFactory can be used when the service does not need any constructor argument
            Service\PseudoRandomValue::class => InvokableFactory::class,
        ],
        'aliases' => [
            Service\RandomValue::class => Service\PseudoRandomValue::class,
        ],
    ]
];