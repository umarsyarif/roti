<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kontak extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/KontakModel', 'kontaks');
        $this->data['modul'] = 'kontak';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->kontaks->get_table();
    	$this->kontaks->view('admin/kontak/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['item'] = $this->kontaks->get_by_id($id);
        }else{
            $row = array(
                'no_hp'  => "",
                'alamat' => ""
                );
            $this->data['item'] = $row;
        }
        $this->kontaks->form('admin/kontak/form', $this->data);
    }
    
    public function update(){
    	$data = array(
                'no_hp'  => $this->input->post('no_hp'),
                'alamat' => nl2br($this->input->post('alamat'))
                );
        $this->kontaks->update('kontak', array('id' => $this->input->post('id')), $data);

        redirect('admin/kontak');
    }
}