<?php

function __autoload($className)
{
    if (strpos($className, 'Entity') > 0) {
        $path = __DIR__ . "/../models/{$className}.php";
    } elseif (strpos($className, 'Collection') > 0) {
        $path = __DIR__ . "/../models/{$className}.php";
    } elseif (strpos($className, 'Database') > 0) {
        $path = __DIR__ . "/../system/{$className}.php";
    }else {
        $path = __DIR__."/../system/{$className}.php";
    }

    require_once $path;
}
require_once __DIR__."/../functions/functions.php";


