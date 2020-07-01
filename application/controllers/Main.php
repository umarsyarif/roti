<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MainModel', 'mains');
		$this->data['modul'] = 'main';
	}

	function index()
	{
		if($_SESSION['level']==0){
			$url = 'admin/main';
		}else{
			$url = 'user/main';
		}
		$this->template->display($url, $this->data);
	}
}
