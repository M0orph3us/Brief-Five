<?php
function autoload($class)
{
    $directories = ['../class/', '../class/repository/', '../../Backend/class/', '../../Backend/class/repository/'];

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