<?php
function autoload($class)
{
    $urlClass = __DIR__ .  '/../class/';
    $urlRepo = __DIR__ . '/../models/repositories/';
    $urlModels =  __DIR__ . '/../models/';
    $urlRouter = __DIR__ . '/../controller/';

    $directories = [
        $urlClass,
        $urlRepo,
        $urlModels,
        $urlRouter
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

require  __DIR__ . '/../router/router.php';
