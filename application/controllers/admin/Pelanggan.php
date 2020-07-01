<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelanggan extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/PelangganModel', 'pelanggans');
        $this->data['modul'] = 'pelanggan';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->pelanggans->get_table();
    	$this->pelanggans->view('admin/pelanggan/table', $this->data);
  	}

    public function hapus($id)
    {
		$this->pelanggans->delete_by_id('pelanggan', array('id_pelanggan' => $id));
		$pelanggan = $this->pelanggans->get_by_id($id);
		
		$this->pelanggans->delete_by_id('user', array('username' => $pelanggan['email']));	
        redirect('admin/pelanggan');
    }
}