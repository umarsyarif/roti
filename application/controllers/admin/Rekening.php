<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekening extends MY_Controller {

  	public function __construct(){
	    parent::__construct();
		$this->load->model('admin/RekeningModel', 'rekening');
        $this->data['modul'] = 'rekening';
  	}

  	public function index()
  	{
        $this->data['row'] = $this->rekening->get_table();
    	$this->rekening->view('admin/rekening/table', $this->data);
  	}

    function form($id=null)
    {
        $this->data['id'] = $id;
        if($id!=""){
            $this->data['aksi'] = 'update';
            $this->data['item'] = $this->rekening->get_by_id($id);
        }else{
            $this->data['aksi'] = 'insert';
            $row = array(
                'nm_bank' => "",
                'no_rek'  => "",
                'an'  => "",
                );
            $this->data['item'] = $row;
        }
        $this->rekening->form('admin/rekening/form', $this->data);
    }

    public function insert()
    {
        $data = array(
                'nm_bank' => $this->input->post('nm_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'an' => $this->input->post('an'),
                );
        $this->rekening->save('rekening', $data);

        redirect('admin/rekening');
    }
    
    public function update(){
    	$data = array(
                'nm_bank' => $this->input->post('nm_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'an' => $this->input->post('an'),
                );
        $this->rekening->update('rekening', array('id' => $this->input->post('id')), $data);
        
        redirect('admin/rekening');
    }

    public function hapus($id)
    {
        $this->rekening->delete_by_id('rekening', array('id' => $id));

        redirect('admin/rekening');
    }
}