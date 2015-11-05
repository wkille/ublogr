<?php

define('DB_TYPE', 'mysql');
// (working) define('DB_HOST', '0.0.0.0');
define('DB_HOST', getenv('IP'));
define('DB_NAME', 'mvc');
define('DB_USER', getenv("C9_USER"));
define('DB_PASS', '');

