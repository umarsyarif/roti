<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Awal extends CI_Controller {

  	public function __construct(){
    	parent::__construct();
  	}

  	public function index(){
    	$this->load->model('m_index');
		$data['layanan']    = $this->m_index->lihat_data_layanan();
		$data['produk']     = $this->m_index->lihat_data_produk();
		$data['profil']     = $this->m_index->lihat_data_profil();
		$data['kontak']     = $this->m_index->lihat_data_kontak();
		$data['sertifikat'] = $this->m_index->lihat_data_sertifikat();
		$data['galeri']     = $this->m_index->lihat_data_galeri();
				
		$this->load->view('v_index', $data);	
  	}
}
