<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lpenjualan extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/PenjualanModel', 'penjualans');
        $this->data['modul'] = 'lpenjualan';
  	}

  	public function index()
  	{
    	$this->penjualans->view('admin/laporan/penjualan', $this->data);
  	}

    public function tampil(){
        $kategori            = $_POST['kategori'];
        $data                = explode(' s/d ', $kategori);
        $this->data['awal']  = $data[0];
        $this->data['akhir'] = $data[1];
        $list                = array();
        $row = $this->penjualans->get_where('a.tgl_jual>="'.date('Y-m-d', strtotime($data[0])).'" AND a.tgl_jual<="'.date('Y-m-d', strtotime($data[1])).'"');
        foreach ($row as $penjualans) {
            $cek_pembayaran = $this->penjualans->cek_pembayaran($penjualans->id);
            if(count($cek_pembayaran)>0){
                if($cek_pembayaran[0]->status!=""){
                    $list[] = $penjualans;
                }
            }
        }
        $this->data['row']     = $list;
        $this->data['control'] = $this;
        $this->load->view('admin/laporan/tampil', $this->data);
    }

    public function cetak($kat){
        $kategori            = $kat;
        $data                = explode('%20', $kategori);
        $this->data['awal']  = $data[0];
        $this->data['akhir'] = $data[1];
        $list                = array();
        $row = $this->penjualans->get_where('a.tgl_jual>="'.date('Y-m-d', strtotime($data[0])).'" AND a.tgl_jual<="'.date('Y-m-d', strtotime($data[1])).'"');
        foreach ($row as $penjualans) {
            $cek_pembayaran = $this->penjualans->cek_pembayaran($penjualans->id);
            if(count($cek_pembayaran)>0){
                if($cek_pembayaran[0]->status!=""){
                    $list[] = $penjualans;
                }
            }
        }
        $this->data['row']     = $list;
        $this->data['control'] = $this;
        $this->load->view('admin/laporan/cetak', $this->data);
    }

    public function download($kat){
        $kategori            = $kat;
        $data                = explode('%20', $kategori);
        $this->data['awal']  = $data[0];
        $this->data['akhir'] = $data[1];
        $list                = array();
        $row = $this->penjualans->get_where('a.tgl_jual>="'.date('Y-m-d', strtotime($data[0])).'" AND a.tgl_jual<="'.date('Y-m-d', strtotime($data[1])).'"');
        foreach ($row as $penjualans) {
            $cek_pembayaran = $this->penjualans->cek_pembayaran($penjualans->id);
            if(count($cek_pembayaran)>0){
                if($cek_pembayaran[0]->status!=""){
                    $list[] = $penjualans;
                }
            }
        }
        $this->data['row']     = $list;
        $this->data['control'] = $this;
        $this->load->view('admin/laporan/download', $this->data);
    }
}