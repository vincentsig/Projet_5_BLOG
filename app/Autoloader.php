<?php

namespace App;

/**
 * Class Autoloader
 *
 */
class Autoloader
{

    /**
     * register autoloader
     * execute the function 'autoload' inside the class __CLASS__
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * autoload only the class with the namespace of your application (here it's App\)
     * if $class start with App\, remove App\ and replace '\' by '/' ,then require the file.
     * @param $class  name of the loading class
     */
    public static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}
