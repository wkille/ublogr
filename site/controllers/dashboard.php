<?php

class Dashboard extends Controller {
    
    
    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            // (working) header('location: https://ublogr-wkille.c9.io/site/login');
            header('location:' .URL. 'login');
            exit;
        }
    }
    
    function index() {
        $this->view->render('dashboard/index');
    }
    
    function logout() {
        Session::destroy();
        // (working) header('location: https://ublogr-wkille.c9.io/site/login');
        header('location:' .URL. 'login');
        exit;
    }
    
}

