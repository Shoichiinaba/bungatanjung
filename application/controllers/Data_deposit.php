<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_deposit extends AUTH_Controller
{
	var $template = 'template/index';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->helper('url');
	}

	function get_ajax()
	{
		$list = $this->M_transaksi->get_datatables();
		$data = array();
		$no = @$_POST['start'];

		foreach ($list as $g) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $g->date;
			$row[] = $g->Nama_toko;
			$row[] = $g->status;
			$row[] = $g->invoice;
			$row[] = $g->nominal;
			$row[] = $g->balance;
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->M_transaksi->count_all(),
			"recordsFiltered" => $this->M_transaksi->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	function index()
	{
		$data['content'] 		= 'admin/list_deposit';
		$data['list']			= $this->M_transaksi->deposit();
		$data['userdata'] 		= $this->userdata;
		$this->load->view($this->template, $data);
	}

	function hapus($params = '')
	{
		$this->M_transaksi->delete($params);
		$this->session->set_flashdata('sukses', "Berhasil Di Hapus");
		return redirect('Data_deposit');
	}
}
