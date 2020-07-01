<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginModel extends CI_Model {
    
    public function get($username){
    	$this->db->select('*')
    			 ->from('user')
    			 ->where('username', $username); 
        $result = $this->db->get()->row(); 
        return $result;
    }

    public function get_pelanggan($username){
        $this->db->select('*')
                 ->from('pelanggan')
                 ->where('email', $username); 
        $result = $this->db->get()->row(); 
        return $result;
    }

    public function save($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}