<?php

require 'config/paths.php';
require 'config/database.php';
require 'config/constants.php';

// Also spl_autoload_register (Take a look if you like)
function __autoload($class) {
    
    require LIBS. $class . ".php";
}

// require 'libs/Bootstrap.php';
// require 'libs/Controller.php';
// require 'libs/View.php';
// require 'libs/Model.php';

// // Library
// require 'libs/Database.php';
// require 'libs/Session.php';
// require 'libs/Hash.php';

$app = new Bootstrap();

