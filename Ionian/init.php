<?php

namespace Ionian;

define("ROOT", dirname(__DIR__));

if(!defined("DIRECTORY_SEPARATOR ")){
    PHP_OS == "Windows" || PHP_OS == "WINNT" ? define("DIRECTORY_SEPARATOR ", "\\") : define("DIRECTORY_SEPARATOR ", "/");
}

spl_autoload_register(function($class){
    $class = ltrim($class, '\\');
    $class = ROOT . "\\" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($class)) {
        require_once $class;
    }
});