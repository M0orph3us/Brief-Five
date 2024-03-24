<?php
function autoload($class)
{
    $urlClass = __DIR__ .  '/../app/class/';
    $urlModels =  __DIR__ . '/../app/models/';
    $urlRepo = __DIR__ . '/../app/models/repositories/';
    $urlRouter = __DIR__ . '/../app/controllers/';


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

$_SESSION['isConnected'] = false;

require __DIR__ . '/../config/configRouter.php';
include __DIR__ . '/../config/debug.php';

$directory = __DIR__ . '/../app/services/';
$files = glob($directory . '*.php');
foreach ($files as $file) {
    require $file;
}
// require __DIR__ . '/../app/services/Response.php';
// require __DIR__ . '/../app/services/PasswordHash.php';
// require __DIR__ . '/../app/services/PasswordVerify.php';
// require __DIR__ . '/../app/services/Sanitize.php';
// require __DIR__ . '/../app/services/CSRFToken.php';

require __DIR__ . '/../app/router/router.php';
