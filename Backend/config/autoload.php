<?php
function autoload($class)
{
    $urlClass = __DIR__ .  '/../class/';
    $urlRepo = __DIR__ . '/../models/repositories/';
    $urlModels =  __DIR__ . '/../models/';

    $directories = [
        $urlClass,
        $urlRepo,
        $urlModels
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }

    exit("The $class.php file does not exist in the class or repository directory");
}

spl_autoload_register("autoload");

session_start();
