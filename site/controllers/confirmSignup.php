<?php

class confirmSignup extends Controller {
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    function index() {
        $this->view->title = 'Confirm Signup';
        $this->view->render('header');
        $this->view->render('confirmSignup/index');
        $this->view->render('footer');
    }
    
}

