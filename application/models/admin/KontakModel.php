<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class KontakModel extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
    }

    function view($template, $data=null){
        $data['conten']  =$this->load->view($template, $data, true);
        $this->template->display($template, $data);
    }

    function form($template, $data=null){
        $this->template->display($template, $data);
    }

    public function get_table()
    {
        $query = $this->db->get('kontak');
 
        return $query->row();
    }

    public function get_by_id($id)
    {
        $where = "id='".$id."'";
        $this->db->where($where);
        $query = $this->db->get('kontak');
 
        return $query->row_array();
    }

    public function update($table, $where, $data)
    {
    	$this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
}