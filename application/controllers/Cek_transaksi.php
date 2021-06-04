<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_transaksi extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_import');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['content'] 		= 'admin/cek_trx';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

}
