<?php

class Index extends Controller {
    
    function __construct() {
        
        parent::__construct();
    }
    
    function index() {
        // echo Hash::create('sha256', 'wayne', HASH_PASSWORD_KEY);
        $this->view->title = 'Home';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }
    
    /* -? what is this -?!
    function details() {
        $this->view->title = 'Details';
        $this->view->render('index/index');
    }
    */
}

