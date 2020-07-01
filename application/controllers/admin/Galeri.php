<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galeri extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/GaleriModel', 'galeris');
        $this->data['modul'] = 'galeri';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->galeris->get_table();
    	$this->galeris->view('admin/galeri/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['aksi'] = 'update';
            $this->data['item'] = $this->galeris->get_by_id($id);
        }else{
            $this->data['aksi'] = 'insert';
            $row = array(
                'nama_foto' => "",
                'foto'      => ""
                );
            $this->data['item'] = $row;
        }
        $this->galeris->form('admin/galeri/form', $this->data);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './fileupload/galeri/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('nama_foto');
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return 'fileupload/galeri/'.$this->upload->data("file_name");
        }else{
            return "default.jpg";
        }
    }

    public function insert()
    {
        $data = array(
                'nama_foto' => $this->input->post('nama_foto'),
                'foto'      => $this->_uploadImage(),
                );
        $this->galeris->save('galeri', $data);

        redirect('admin/galeri');
    }
    
    public function update(){
        if ($_FILES["foto"]["name"]!='') {
            $image = $this->_uploadImage();
        } else {
            $image = $this->input->post('foto_lama');
        }

    	$data = array(
                'nama_foto' => $this->input->post('nama_foto'),
                'foto'      => $image
                );
        $this->galeris->update('galeri', array('id' => $this->input->post('id')), $data);
        
        redirect('admin/galeri');
    }

    public function hapus($id)
    {
        $this->galeris->delete_by_id('galeri', array('id' => $id));

        redirect('admin/galeri');
    }
}