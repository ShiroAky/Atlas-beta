<?php

    // DS is defined to shorten the DIRECTORY_SEPARATOR constant for easier and less obtrusive use.
    define('DS', DIRECTORY_SEPARATOR);

    // The function in charge of doing all the verifications of the classes at the time of autoloading.
    function app_autoload($class) {
        $class = str_replace('\\', DS, $class);
        if (file_exists("{$class}.php")) { require_once "{$class}.php"; } else {
            echo "No existe el archivo {$class}.php";
        }
    }

    // Autoload
    spl_autoload_register('app_autoload');