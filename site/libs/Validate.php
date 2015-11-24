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
        
        // if($table) include 'db connection'
        
        // $error = ''; 
        
        // $_POST['email'] must be an email address //
        // $_POST['email'] must not be blank //
        // $_POST['email'] must not be registered already
        // $_POST['username'] must be > 6 chars
        // $_POST['username'] must match the specified regex
        // $_POST['username'] must not already be registered
        // $_POST['password'] must not be blank
        // $_POST['password'] must match the specified regex
        
        
        if(isset($data['email'])) {
            
            if(empty($data['email'])) {
                $this->error = "Please enter an email address";
            } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error = "Please enter a valid email address";
            } else {
                $this->error = "No error";
            }
            return $error;
        }
        
        /*if($data['username']) {
            
            // validate as a username
        
        }
        
        if($data['password'] {
            
            //validate as a password
        
        }*/
        
    }
}

