<?php

class Auth {
    
    public static function handleLogin() {
        
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            // (working) header('location: https://ublogr-wkille.c9.io/site/login');
            header('location:' .URL. 'login');
            exit;
        }
    }
}