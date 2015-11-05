<?php

/*
// class Database extends PDO {
class Database {
    
    public function __construct() {
        
        // parent::__construct();
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "mvc";
        $dbport = 3306;
        
        $db = new mysqli($servername, $username, $password, $database, $dbport);
        // var_dump($db);

    }
}
*/

class Database extends PDO {
    public function __construct() {
        
        // $servername = getenv('IP');
        // $username = getenv('C9_USER');
        // $password = "";
        // $database = "mvc";
        // $dbport = 3306;
        
        // (working) parent::__construct('mysql:host=0.0.0.0;dbname=mvc', $username, $password);
        parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        // parent::__construct('mysql:host=$servername;dbname=$database', $username, $password);
    }
}


