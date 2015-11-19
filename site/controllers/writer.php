<?php

class Login extends Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        // echo Hash::create('md5', 'test', HASH_KEY);
        $this->view->title = 'Writer Signup';
        $this->view->render('header');
        $this->view->render('writersignup/index');
        $this->view->render('footer');
    }
    
    function run() {
        $this->model->run();
    }
}

