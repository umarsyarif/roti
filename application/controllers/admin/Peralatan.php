<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Peralatan extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/PeralatanModel', 'peralatans');
        $this->data['modul'] = 'peralatan';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->peralatans->get_table();
    	$this->peralatans->view('admin/peralatan/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['aksi'] = 'update';
            $this->data['item'] = $this->peralatans->get_by_id($id);
        }else{
            $this->data['aksi'] = 'insert';
            $row = array(
                'kode_alat' => "",
                'nama_alat' => "",
                'merek'     => "",
                'ukuran'    => "",
                'bahan'     => "",
                'status'    => "",
                'jumlah'    => "",
                );
            $this->data['item'] = $row;
        }
        $this->peralatans->form('admin/peralatan/form', $this->data);
    }

    public function insert()
    {
        $data = array(
                'kode_alat' => $this->input->post('kode_alat'),
                'nama_alat' => $this->input->post('nama_alat'),
                'merek'     => $this->input->post('merek'),
                'ukuran'    => $this->input->post('ukuran'),
                'bahan'     => $this->input->post('bahan'),
                'status'    => $this->input->post('status'),
                'jumlah'    => $this->input->post('jumlah'),
                );
        $this->peralatans->save('peralatan', $data);

        redirect('admin/peralatan');
    }
    
    public function update(){
    	$data = array(
                'kode_alat' => $this->input->post('kode_alat'),
                'nama_alat' => $this->input->post('nama_alat'),
                'merek'     => $this->input->post('merek'),
                'ukuran'    => $this->input->post('ukuran'),
                'bahan'     => $this->input->post('bahan'),
                'status'    => $this->input->post('status'),
                'jumlah'    => $this->input->post('jumlah'),
                );
        $this->peralatans->update('peralatan', array('kode_alat' => $this->input->post('id')), $data);
        
        redirect('admin/peralatan');
    }

    public function hapus($id)
    {
        $this->peralatans->delete_by_id('peralatan', array('kode_alat' => $id));

        redirect('admin/peralatan');
    }
}