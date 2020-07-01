<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PemesananModel extends CI_Model {
 
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
        $this->db->select('a.id, a.kode_beli, a.id_pelanggan, a.kode_produk, a.tgl_jual, a.wkt_jual, a.harga_satuan, a.jumlah_produk, a.harga_jual, c.nama_pelanggan, b.nama_produk');
        $this->db->from('penjualan a, produk b, pelanggan c');
        $where = "a.kode_produk=b.kode_produk AND a.id_pelanggan=c.id_pelanggan";
        $this->db->where($where, null, false);
        $where = 'a.id_pelanggan="'.$_SESSION['id'].'"';
        $this->db->where($where);
        $this->db->order_by('a.tgl_jual desc, a.wkt_jual desc');
        $query = $this->db->get();
 
        return $query->result();
    }

    public function get_by_id($id)
    {
        $where = "id='".$id."'";
        $this->db->where($where);
        $query = $this->db->get('penjualan');
 
        return $query->row_array();
    }

    public function get_kode_beli()
    {
        $this->db->select_max('kode_beli');
        $query = $this->db->get('penjualan');
 
        return $query->row_array();
    }

    public function get_produk($id=null)
    {
        if($id!=""){
            $where = 'kode_produk="'.$id.'"';
            $this->db->where($where);
        }
        
        $query = $this->db->get('produk');
 
        return $query->result();
    }

    public function get_rekening()
    {   
        $query = $this->db->get('rekening');
 
        return $query->result();
    }

    public function save($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $where, $data)
    {
    	$this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}