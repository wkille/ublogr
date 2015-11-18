<?php

class Login extends Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        // echo Hash::create('md5', 'test', HASH_KEY);
        $this->view->title = 'Login';
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }
    
    function run() {
        $this->model->run();
    }
}

