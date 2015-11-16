<?php

require 'config.php';
require 'util/Auth.php';

// Also spl_autoload_register (Take a look if you like)
function __autoload($class) {
    
    require LIBS. $class . ".php";
}

// Load the Bootstrap
$bootstrap = new Bootstrap();

// Optional Path Settings
// $bootstrap->setControllerPath('c');
// $bootstrap->setModelPath('m');
// $bootstrap->setDefaultFile('optional.php');
// $bootstrap->setErrorFile('error.php');

$bootstrap->init();



