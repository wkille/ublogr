<?php

class View {
    
    function __construct() {
        
        // echo "This is the view<br />";
    }
    
    public function render($name, $noInclude = false) {
    
        require 'views/' .$name. '.php';

    }
}