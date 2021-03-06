<?php

class Writer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function userList() {
        
        return $this->db->select('SELECT userid, login, role FROM user');
    
    }
    
    public function userSingleList($userid) {
        
        return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));
    }
    
    public function checkForEmail($email) {
        
        if($this->db->select('SELECT `email` FROM writer WHERE `email` = :email LIMIT 1', array(':email' => $email))[0]['email'] == $email) {
            return true;
        } else return false;
    }
    
    public function checkForUsername($username) {
        
        if($this->db->select('SELECT `username` FROM writer WHERE `username` = :username LIMIT 1', array(':username' => $username))[0]['username'] == $username) {
            return true;
        } else return false;
    }
    
    public function create($data) {
        
        $this->db->insert('writer', array(
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY)
            ));
    }
    
    public function editSave($data) {
        
        
        $postData = array(
                'login' => $data['login'],
                'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
                'role' => $data['role']
            );
        
        $this->db->update('user', $postData, "`userid` = '{$data['userid']}'");
        
    }
    
    public function delete($userid) {
        
        // database wrapper - ??
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner') return false;
        
        $this->db->delete('user', "userid = '$userid'");
    }
}