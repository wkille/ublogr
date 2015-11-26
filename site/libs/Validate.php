<?php

/*************************************************
 * Validate($data, $table)
 * 
 * A module for checking the validity of input.
 * 
 * @param $data associative array:
 * - the inputted data (& data types) to be 
 *      checked
 * 
 * - names for data types are 'email' for email
 *      addresses, 'username' for usernames,
 *      'password' for passwords.
 * 
 * - Any variable included in the $data array passed
 *      to Validate is assumed to need to have a
 *      non-zero value
 * 
 * @param $table string:
 * - the DB table to check in (if any)
 *  
 * 
 * @return $error string Empty if no errors detected.
 * 
 * 
 **************************************************/
 
Class Validate {
    
    /****************************************************
     * Construct
     * 
     * @param $data associative array Data-type => data
     *      as key => value.
     * 
     * @param $table string Name of table to query
     * 
     * @param $error string The error to be returned, or
     *      'No error'.
     * 
     *****************************************************/
    function __construct($data) {
        
        // $_POST['email'] must be an email address //
        // $_POST['email'] must not be blank //
        // $_POST['email'] must not be registered already //
        // $_POST['username'] must be > 4 chars //
        // $_POST['username'] must match the specified regex //
        // $_POST['username'] must not already be registered //
        // $_POST['password'] must not be blank //
        // $_POST['password'] must match the specified regex //
        
        if(isset($data['email'])) {
            if(empty($data['email'])) {
                $this->error[] = "Please enter an email address";
            } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error[] = "Please enter a valid email address";
            } elseif(strlen($data['email'])>25) {
                $this->error[] = "Email addresses must be no more than 25 characters long";
            }
            
            if(!empty($this->error)) {
                return $error;
                break;
            }
        }
        
        if(isset($data['username'])) {
            if(empty($data['username'])) {
                $this->error[] = "Please enter a username";
            } elseif(preg_match('/[^a-z0-9]/i', $data['username'])) {
                $this->error[] = "Please only use letters and numbers in your username";
            } elseif(strlen($data['username'])<4) {
                $this->error[] = "Usernames must be at least four characters long";
            } elseif(strlen($data['username'])>25) {
                $this->error[] = "Usernames must be be no more than 25 characters long";
            }
            
            if(!empty($this->error)) {
                return $error;
                break;
            }
        }
        
        if(isset($data['password'])) {
            if(empty($data['password'])) {
                $this->error[] = "Please enter a password";
            } elseif(preg_match('/[^a-z0-9]/i', $data['password'])) {
                $this->error[] = "Please only use letters and numbers in your password";
            } elseif(strlen($data['password'])<6) {
                $this->error[] = "Passwords must be at least six characters long";
            } elseif(strlen($data['password'])>32) {
                $this->error[] = "Passwords must be no more than 32 characters long";
            }
            
            if(!empty($this->error)) {
                return $error;
                break;
            }
        }
        
        return $error;
        
    }
}

