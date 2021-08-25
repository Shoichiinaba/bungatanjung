<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_transaksi extends AUTH_Controller 
{
	var $template='template/index';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->helper('url');		
	}
	function index()
	{
		$data['content'] 		= 'admin/cek_trx';
		$data['list']			=$this->M_transaksi->cek_transaksi();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function cek_trx_shopee()
	{
		$data['content'] 		= 'admin/cek_trx_shopee';
		$data['dep_up'] 		= $this->M_transaksi->deposupload();
		$data['trx_up'] 		= $this->M_transaksi->trxupload();
		$data['list']			=$this->M_transaksi->cek_transaksi();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	public function export_excel()
	{	
		$data['title']			= 'Export Excel';
 		$data['list']			=$this->M_transaksi->filter_lap();
		$this->load->view('excel/Export_excel', $data);
 	}

}
