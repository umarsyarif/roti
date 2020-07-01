<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sertifikat extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/SertifikatModel', 'sertifikats');
        $this->data['modul'] = 'sertifikat';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->sertifikats->get_table();
    	$this->sertifikats->view('admin/sertifikat/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['aksi'] = 'update';
            $this->data['item'] = $this->sertifikats->get_by_id($id);
        }else{
            $this->data['aksi'] = 'insert';
            $row = array(
                'logo'       => "",
                'judul'      => "",
                'keterangan' => ""
                );
            $this->data['item'] = $row;
        }
        $this->sertifikats->form('admin/sertifikat/form', $this->data);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './fileupload/sertifikat/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('judul');
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            return 'fileupload/sertifikat/'.$this->upload->data("file_name");
        }else{
            return "default.jpg";
        }
    }

    public function insert()
    {
        $data = array(
                'judul'      => $this->input->post('judul'),
                'logo'       => $this->_uploadImage(),
                'keterangan' => $this->input->post('keterangan'),
                );
        $this->sertifikats->save('sertifikat', $data);

        redirect('admin/sertifikat');
    }
    
    public function update(){
        if ($_FILES["logo"]["name"]!='') {
            $image = $this->_uploadImage();
        } else {
            $image = $this->input->post('logo_lama');
        }

    	$data = array(
                'judul'      => $this->input->post('judul'),
                'logo'       => $image,
                'keterangan' => $this->input->post('keterangan'),
                );
        $this->sertifikats->update('sertifikat', array('id' => $this->input->post('id')), $data);
        
        redirect('admin/sertifikat');
    }

    public function hapus($id)
    {
        $this->sertifikats->delete_by_id('sertifikat', array('id' => $id));

        redirect('admin/sertifikat');
    }
}