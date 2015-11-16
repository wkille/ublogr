<?php

class Note extends Controller {
    
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();

    }
    
    public function index() {
        $this->view->noteList = $this->model->noteList();
        $this->view->render('note/index');
    }
    
    public function create() {
        
        $data = array(
            
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        );

        $this->model->create($data);
        header('location:' .URL. 'note');
    }
    
    public function edit($noteid) {
        
        $this->view->note = $this->model->noteSingleList($noteid);
        // handle errors better than this...
        if (empty($this->view->note)) {
            
            die("This is an invalid note!");
        }
        $this->view->render('note/edit');
    }
    
    public function editSave($noteid) {
        
        $data = array(
            'noteid' => $noteid,
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        );
        
        
        // @todo: do your error checking!
        
        $this->model->editSave($data);
        header('location:' .URL. 'note');
    }
    
    public function delete($noteid) {
        $this->model->delete($noteid);
        header('location:' .URL. 'note');
    }
}
    
