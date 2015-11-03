<?php

class Bootstrap {
    
    function __construct() {
        
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // print_r($url);
        
        $file = "controllers/" .$url[0]. ".php";
        
        /*
        nb. should not have controller name in here in case ever want to
        change the name of controller. It should be set in a config.ini file
        or similar.
        */
        
        if (file_exists($file)) {
            
            require $file;
        } else {
            
            require 'controllers/error.php';
            $controller = new Error();
            // throw new Exception("The file $file does not exist.");
            return false;
        }

        $controller = new $url[0];

        if (isset($url[2])) {
    
        $controller->{$url[1]}($url[2]);
        
        } else {
    
            if (isset($url[1])) {
    
                $controller->{$url[1]}();
    
            }
        }
    }
}




