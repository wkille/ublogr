<?php

require 'config.php';
require 'util/Auth.php';

// Also spl_autoload_register (Take a look if you like)
function __autoload($class) {
    
    require LIBS. $class . ".php";
}


$app = new Bootstrap();

