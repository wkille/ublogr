<?php

class Writer extends Controller {
    
    
    public function __construct() {
        parent::__construct();
        //Auth::handleLogin();

    }
    
    /***************************************************
     * index
     * 
     * - Renders writer's profile View.
     * 
     * - Will need to populate it with the particular 
     *   writer's details
     * 
     ***************************************************/
    public function index() {
        $this->view->title = 'Signup';
        //$this->view->userList = $this->model->userList();
        $this->view->render('header');
        $this->view->render('writer/index');
        $this->view->render('footer');
    }
    
    /***************************************************
     * create
     * 
     * - Writers signup method
     * 
     * - takes the '$data' from their form input & calls
     *   on the model to create a new writer.
     * 
     * - Redirects to profile page, though there will need
     *   to be an intermediate 'signup' confirmation step.
     * 
     ***************************************************/
    public function create() {
        
        $data = array();
        $data['email'] = $_POST['email'];
        $data['login'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        
        
        $this->validate = new Validate($data, 'writer');
        
        // var_dump($this->validate->error);
        
        
        if ($this->validate->error == "No error") {
            
            
            // continue
        
            $this->model->create($data);
            
            /*
            // send a confirmation email - needs prettyfying with From field, etc
            // the message - needs an identifying link (i.e. GET params)
            $msg = "Follow the link to confirm your signup!\n"
                        . '<a href="http://ublogr.com">This is the link...</a>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // use wordwrap() if lines are longer than 70 characters
            // $msg = wordwrap($msg,70);
            // send email
            mail($_POST['email'],"Confirmation",$msg,$headers);
            */
    
            header('location:' .URL. 'confirmSignup');
            
            
        } else {
            header('location:' .URL. 'writer');
            echo $this->validate->error;
        }
    }
    
    /***************************************************
     * edit
     * 
     * - profile updates
     * 
     * - Takes the writer's id
     * 
     * - Redirects to the edit-profile page
     * 
     ***************************************************/
    public function edit($id) {
        $this->view->title = 'Edit User';
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }
    
    /***************************************************
     * editSave
     * 
     * - sends updates to the database
     * 
     * - Takes the writer's id
     * 
     * - Redirects to the profile page
     * 
     ***************************************************/
    public function editSave($id) {
        
        $data = array();
        $data['userid'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        
        
        // @todo: do your error checking!
        
        $this->model->editSave($data);
        header('location:' .URL. 'user');
    }
    
    /***************************************************
     * delete
     * 
     * - deletes the writer's profile
     * 
     ***************************************************/
    public function delete($id) {
        $this->model->delete($id);
        header('location:' .URL. 'user');
    }
}
    
