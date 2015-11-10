<?php

// Always provide a trailing slash (/) on a path
define('URL', 'https://ublogr-wkille.c9.io/site/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', getenv('IP'));
define('DB_NAME', 'mvc');
define('DB_USER', getenv("C9_USER"));
define('DB_PASS', '');

// The sitewide hashkey, do not change this because it's used for passwords!
// This is for other hash keys, not sure yet...
define('HASH_GENERAL_KEY', '1');

// This is for database passwords only
define('HASH_PASSWORD_KEY', '1');