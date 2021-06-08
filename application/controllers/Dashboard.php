<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_transaksi');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['content'] 			= 'admin/home';
		$data['dep_up'] 			= $this->M_transaksi->deposupload();
		$data['trx_up'] 			= $this->M_transaksi->trxupload();
		$data['jml_trx_deposit'] 	= $this->M_transaksi->trx_deposit();
		$data['jml_depos_no'] 		= $this->M_transaksi->depos_no()[0]['total'];
		// $data['jml_trx_no'] 		= $this->M_transaksi->trx_no()[0]['total'];
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}

}
