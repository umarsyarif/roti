<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/ProfilModel', 'profils');
        $this->data['modul'] = 'profil';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->profils->get_table();
    	$this->profils->view('admin/profil/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['item'] = $this->profils->get_by_id($id);
        }else{
            $row = array(
                'isi_teks_profil' => "",
                'isi_teks_visi'   => ""
                );
            $this->data['item'] = $row;
        }
        $this->profils->form('admin/profil/form', $this->data);
    }
    
    public function update(){
    	$data = array(
                'isi_teks_profil' => nl2br($this->input->post('profil')),
                'isi_teks_visi'   => nl2br($this->input->post('visi'))
                );
        $this->profils->update('profil', array('id' => $this->input->post('id')), $data);

        redirect('admin/profil');
    }
}