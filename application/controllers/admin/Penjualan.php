<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends MY_Controller {
	
	var $data = array();

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/PenjualanModel', 'penjualans');
        $this->load->model('admin/KontakModel', 'kontaks');
        $this->load->model('admin/PelangganModel', 'pelanggans');
        $this->data['modul'] = 'penjualan';
  	}

  	public function index()
  	{
    	$this->penjualans->view('admin/penjualan/table', $this->data);
  	}

  	public function ajax_list()
    {
        $list = $this->penjualans->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $penjualans) {
            $cek_pembayaran = $this->penjualans->cek_pembayaran($penjualans->id);
            if(count($cek_pembayaran)>0){
                if($cek_pembayaran[0]->status==""){
                    $st_pembayaran = "Telah Bayar";
                    $list = '<li><a href="'.base_url('index.php/admin/penjualan/pembayaran/'.$penjualans->id).'">Pembayaran</a></li>';
                }else{
                    $st_pembayaran = "Lunas";
                    $list = '<li><a href="'.base_url('index.php/admin/penjualan/cetak/'.$penjualans->id).'" target="_blank">Surat Jalan</a></li>
                    <li><a href="'.base_url('index.php/admin/penjualan/pembayaran/'.$penjualans->id).'">Pembayaran</a></li>';
                }
            }else{
                $st_pembayaran = "Belum Bayar";
                $list = '';
            }
            $row = array();
            $row['tgl_jual']       = $this->tgl_indo($penjualans->tgl_jual);
            $row['kode_beli']      = $penjualans->kode_beli;
            $row['nama_pelanggan'] = $penjualans->nama_pelanggan;
            $row['nama_produk']    = $penjualans->nama_produk;
            $row['harga_satuan']   = number_format($penjualans->harga_satuan, "0", ",", ".");
            $row['jumlah_produk']  = $penjualans->jumlah_produk;
            $row['harga_jual']     = number_format($penjualans->harga_jual, "0", ",", ".");
            $row['status']         = $st_pembayaran;
            $aksi                  = '<div class="btn-group">
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Perintah</button>
                  <ul class="dropdown-menu" role="menu">
                    '.$list.'
                    <li><a href="javascript:;"  onclick="confirmdel('.$penjualans->id.')">Hapus</a></li>
                  </ul>
                </div>';
            $row['aksi']           = $aksi;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penjualans->count_all(),
                        "recordsFiltered" => $this->penjualans->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function cetak($id)
    {
        $row = $this->penjualans->get_by_id($id);
        $this->data['kontak'] = $this->kontaks->get_table();
        $this->data['pelanggan'] = $this->pelanggans->get_by_id($row[0]['id_pelanggan']);
        $this->data['item'] = $row;
        $this->load->view('admin/penjualan/cetak', $this->data);
    }

    public function pembayaran($id)
    {
        $this->data['control'] = $this;
        $this->data['id'] = $id;
        $row = $this->penjualans->get_by_id($id);
        $this->data['list'] = $this->penjualans->cek_pembayaran($id);;
        $this->data['item'] = $row;
        $this->penjualans->view('admin/penjualan/pembayaran', $this->data);
    }
    
    public function update_pembayaran(){
        $data = array(
                'status' => $this->input->post('status'),
                );
        $this->penjualans->update('pembayaran', array('id_penjualan' => $this->input->post('id')), $data);
        
        redirect('admin/penjualan/pembayaran/'.$this->input->post('id'));
    }

    public function hapus($id)
    {
        $this->penjualans->delete_by_id('penjualan', array('id' => $id));

        redirect('admin/penjualan');
    }
}