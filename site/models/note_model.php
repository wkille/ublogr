<?php

class Note_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function noteList() {
        
        return $this->db->select('SELECT * FROM note');
    }
    
    public function noteSingleList($id) {
        return $this->db->select('SELECT * FROM note WHERE id = :id', array(':id' => $id));
    }
    
    public function create($data) {
        
        $this->db->insert('user', array(
                'login' => $data['login'],
                'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
                'role' => $data['role']
            ));
    }
    
    public function editSave($data) {
        
        
        $postData = array(
                'login' => $data['login'],
                'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
                'role' => $data['role']
            );
        
        $this->db->update('user', $postData, "`id` = {$data['id']} ");
        
    }
    
    public function delete($id) {
        
        // database wrapper - ??
        $result = $this->db->select('SELECT role FROM user WHERE id = :id', array(':id' => $id));

        if ($result[0]['role'] == 'owner') return false;
        
        $this->db->delete('user', "id = '$id'");
    }
}