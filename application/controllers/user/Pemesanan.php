<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemesanan extends CI_Controller {
	
	var $data = array();

  	public function __construct(){
	    parent::__construct();
        $this->load->model('admin/PenjualanModel', 'penjualans');
        $this->load->model('user/PemesananModel', 'pemesanans');
        $this->data['modul'] = 'pemesanan';
  	}

  	public function index()
  	{
        $this->data['control'] = $this;
        $this->data['row'] = $this->pemesanans->get_table();
    	$this->pemesanans->view('user/pemesanan/view', $this->data);
  	}

    public function form($id=null)
    {
        $this->data['control'] = $this;
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['list_rekening'] = $this->pemesanans->get_rekening();
            $this->pemesanans->view('user/pemesanan/konfirmasi', $this->data);
        }else{
            $this->data['list_produk'] = $this->pemesanans->get_produk();
            $this->pemesanans->view('user/pemesanan/form', $this->data);
        }
    }

    public function ajax_produk()
    {
        $list = $this->pemesanans->get_produk($_POST['kode_produk']);
        foreach ($list as $value) {
            $h = array(
                  'harga' => number_format($value->harga, "0", ",", "."),
                  );

            echo json_encode($h);
        }
    }

    public function insert()
    {
        $get = $this->pemesanans->get_produk($this->input->post('kode_produk'));
        print_r($get);
        $harga_satuan = $get[0]->harga;
        $kode_beli = $this->pemesanans->get_kode_beli();
        $data = array(
                'tgl_jual' => date('Y-m-d'),
                'wkt_jual'      => date('H:i:s'),
                'kode_beli'       => $kode_beli['kode_beli']+1,
                'id_pelanggan'       => $_SESSION['id'],
                'kode_produk'       => $this->input->post('kode_produk'),
                'harga_satuan'       => $harga_satuan,
                'jumlah_produk'       => $this->input->post('jumlah'),
                'harga_jual'       => $harga_satuan*$this->input->post('jumlah'),
                );
        $this->pemesanans->save('penjualan', $data);

        redirect('user/pemesanan');
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './fileupload/produk/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('bukti');
        $config['overwrite']            = true;
        $config['max_size']             = 100000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti')) {
            return 'fileupload/produk/'.$this->upload->data("file_name");
        }else{
            return "";
        }
    }

    public function transfer()
    {
        $data = array(
                'id_penjualan' => $this->input->post('id'),
                'bukti'      => $this->_uploadImage(),
                'status'       => "",
                );
        $this->pemesanans->save('pembayaran', $data);

        redirect('user/pemesanan');
    }
}