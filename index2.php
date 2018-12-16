#!/usr/bin/php
<?php

use Support\Application;

/*if (!is_file(__DIR__.'/vendor/autoload.php')) {
    throw new LogicException('The autoload file does not exist, please use composer install');
}*/
//require __DIR__.'/vendor/autoload.php';

//echo (new Application($argv, require __DIR__.'/config/di.global.php'))->run();

$jeu = array(
        array(0,0,0,0,0,0,0),
        array(0,0,0,0,0,0,0),
        array(0,0,0,0,0,0,0),
        array(0,0,0,0,0,0,0),
        array(0,0,0,0,0,0,0),
        array(0,0,0,0,0,0,0),
        array(0,0,0,0,0,0,0)
);
$joueur = 1;

print_r($jeu[0][0]);
