<?php

class Login_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function run() {
        
        $sth = $this->db->prepare("SELECT userid, role FROM user WHERE login = :login AND
                    password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
             
        ));
        
        $data = $sth->fetch();
        
        // $data = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['userid']);
            // (working) header('location: https://ublogr-wkille.c9.io/site/dashboard');
            header('location:' .URL. 'dashboard');
        } else {
            // show an error!
            // (working) header('location: https://ublogr-wkille.c9.io/site/login');
            header('location:' .URL. 'login');
        }
    }
}