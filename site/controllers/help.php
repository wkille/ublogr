<?php

class Help extends Controller {
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    function index() {
        $this->view->title = 'Help';
        $this->view->render('header');
        $this->view->render('help/index');
        $this->view->render('footer');
    }
    
    public function other($arg = false) {
        
        require 'models/help_model.php';
        $model = new Help_Model();
        $this->view->blah = $model->blah();        
    }
}

