<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/ProdukModel', 'produks');
        $this->data['modul'] = 'produk';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->produks->get_table();
    	$this->produks->view('admin/produk/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['aksi'] = 'update';
            $this->data['item'] = $this->produks->get_by_id($id);
        }else{
            $this->data['aksi'] = 'insert';
            $row = array(
                'kode_produk' => "",
                'nama_produk' => "",
                'keterangan'  => "",
                'gambar'      => "",
                'harga'       => "",
                );
            $this->data['item'] = $row;
        }
        $this->produks->form('admin/produk/form', $this->data);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './fileupload/produk/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('nama_produk');
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return 'fileupload/produk/'.$this->upload->data("file_name");
        }else{
            return "default.jpg";
        }
    }

    public function insert()
    {
        $data = array(
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'keterangan'  => $this->input->post('keterangan'),
                'gambar'      => $this->_uploadImage(),
                'harga'       => $this->input->post('harga'),
                );
        $this->produks->save('produk', $data);

        redirect('admin/produk');
    }
    
    public function update(){
        if ($_FILES["gambar"]["name"]!='') {
            $image = $this->_uploadImage();
        } else {
            $image = $this->input->post('gambar_lama');
        }

    	$data = array(
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'keterangan'  => $this->input->post('keterangan'),
                'gambar'      => $image,
                'harga'       => $this->input->post('harga'),
                );
        $this->produks->update('produk', array('id' => $this->input->post('id')), $data);
        
        redirect('admin/produk');
    }

    public function hapus($id)
    {
        $this->produks->delete_by_id('produk', array('id' => $id));

        redirect('admin/produk');
    }
}