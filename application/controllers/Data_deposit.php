<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_deposit extends AUTH_Controller {
	var $template='template/index';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->helper('url');
		
	}
	function index()
	{
		$data['content'] 		= 'admin/list_deposit';
		$data['list']			=$this->M_transaksi->deposit();
		// $data['filt']			=$this->M_transaksi->filter();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function hapus($params = '') {
        $this->M_transaksi->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Data_deposit');
    }

	function data_filter()
	{
	}


}
