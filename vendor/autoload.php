<?php
function autoload($class)
{
    $urlClass = __DIR__ .  '/../app/class/';
    $urlModels =  __DIR__ . '/../app/models/';
    $urlRepo = __DIR__ . '/../app/models/repositories/';
    $urlRouter = __DIR__ . '/../app/controller/';

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

require __DIR__ . '/../config/configRouter.php';
include __DIR__ . '/../config/debug.php';
require __DIR__ . '/../app/services/Response.php';
require __DIR__ . '/../app/router/router.php';