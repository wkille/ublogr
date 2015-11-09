<?php

class User extends Controller {
    
    
    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        if ($logged == false || $role != 'owner') {
            Session::destroy();
            // (working) header('location: https://ublogr-wkille.c9.io/site/login');
            header('location:' .URL. 'login');
            exit;
        }

    }
    
    public function index() {
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }
    
    public function create() {
        
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = md5($_POST['password']);
        $data['role'] = $_POST['role'];
        
        
        // @todo: do your error checking!
        
        $this->model->create($data);
        header('location:' .URL. 'user');
    }
    
    public function edit($id) {
    
    }
    
    public function delete($id) {
    
    }
}
    