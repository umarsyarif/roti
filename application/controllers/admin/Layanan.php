<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Layanan extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/LayananModel', 'layanans');
        $this->data['modul'] = 'layanan';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->layanans->get_table();
    	$this->layanans->view('admin/layanan/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['item'] = $this->layanans->get_by_id($id);
        }else{
            $row = array(
                'isi_layanan_konsumen' => "",
                'isi_pemesanan'        => ""
                );
            $this->data['item'] = $row;
        }
        $this->layanans->form('admin/layanan/form', $this->data);
    }
    
    public function update(){
    	$data = array(
                'isi_layanan_konsumen' => nl2br($this->input->post('konsumen')),
                'isi_pemesanan'        => nl2br($this->input->post('pemesanan'))
                );
        $this->layanans->update('layanan', array('id' => $this->input->post('id')), $data);

        redirect('admin/layanan');
    }
}