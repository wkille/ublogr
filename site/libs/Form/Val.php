<?php

class Val {
    
    public function __construct() {}
    
    public function minlength($data, $arg) {
        
        if(strlen($data) < $arg) {
            
            return "Your string must be at least $arg characters long";
        }
    }
    
    public function maxlength($data, $arg) {
        
        if(strlen($data) > $arg) {
            
            return "Your string must be no more than $arg characters long";
        }
    }
    
    public function integer($data) {
        
        if(ctype_digit($data) == false) {
            
            return "Your string must be a number";
        }
    }
    
    public function __call($name, $arguments) {
        
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }
}