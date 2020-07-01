<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class PenjualanModel extends CI_Model {
 
    var $table = 'penjualan a, produk b, pelanggan c';
    var $column_order = array(null, 'a.tgl_jual', 'a.kode_beli', 'c.nama_pelanggan', 'b.nama_produk', null, null, null, null); //set column field database for datatable orderable
    var $column_search = array('a.id', 'a.kode_beli', 'a.id_pelanggan', 'a.kode_produk', 'a.tgl_jual', 'a.harga_satuan', 'a.jumlah_produk', 'a.harga_jual', 'c.nama_pelanggan', 'b.nama_produk'); //set column field database for datatable searchable 
    var $order = 'a.tgl_jual desc, a.wkt_jual desc'; // default order 
 
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
 
    private function _get_datatables_query()
    { 
        $this->db->select($this->column_search);
        $this->db->from($this->table);
        $where = "a.kode_produk=b.kode_produk AND a.id_pelanggan=c.id_pelanggan";
        $this->db->where($where, null, false);
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by($order);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->select($this->column_search);
        $this->db->from($this->table);
        $where = "a.kode_produk=b.kode_produk AND a.id_pelanggan=c.id_pelanggan";
        $this->db->where($where, null, false);
        $where = "a.id='".$id."'";
        $this->db->where($where);
        $query = $this->db->get();
 
        return $query->result_array();
    }

    public function get_where($data)
    {
        $this->db->select($this->column_search);
        $this->db->from($this->table);
        $where = "a.kode_produk=b.kode_produk AND a.id_pelanggan=c.id_pelanggan";
        $this->db->where($where, null, false);
        $this->db->where($data);
        $this->db->order_by('a.tgl_jual asc, a.wkt_jual asc');
        $query = $this->db->get();
 
        return $query->result();
    }

    public function cek_pembayaran($id){
        $where = "id_penjualan='".$id."'";
        $this->db->where($where);
        $query = $this->db->get('pembayaran');
 
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