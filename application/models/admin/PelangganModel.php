<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PelangganModel extends CI_Model {
 
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
        $query = $this->db->get('pelanggan');
 
        return $query->result();
    }

    public function get_by_id($id)
    {
        $where = "id_pelanggan='".$id."'";
        $this->db->where($where);
        $query = $this->db->get('pelanggan');
 
        return $query->row_array();
    }

    public function delete_by_id($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}