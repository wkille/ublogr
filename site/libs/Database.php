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

/*
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
*/

class Database extends PDO {
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);

    }
    
    
    /*
    * insert
    * @param string $table A name of a table to insert into
    * @param string $data An Associative array
    */
    public function insert($table, $data) {
        
        ksort($data);
        
        $fieldNames = implode('`, `', array_keys($data));
        
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES 
                    ($fieldValues)");

        foreach ($data as $key => $value) {
            
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
        
    }
    
    /*
    * update
    * @param string $table A name of a table to insert into
    * @param string $data An Associative array
    * @param string $where The WHERE query part
    */
    public function update($table, $data, $where) {
        
        ksort($data);
        
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            
            $fieldDetails .= "`$key`=:$key,";
        }
        
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
    }
}


