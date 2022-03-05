<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_transaksi extends AUTH_Controller
{
	var $template = 'template/index';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_import');
		$this->load->helper('url');
	}

	function get_ajax()
	{
		$list = $this->M_import->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $a) {

			$row = array();
			$no++;
			$row[] = $a->count;
			$row[] = $a->order_id;
			$row[] = $a->pagment_date;
			$row[] = $a->invoice;
			$row[] = $a->order_status;
			$row[] = $a->product_id;
			$row[] = $a->product_name;
			$row[] = $a->quantity;
			$row[] = $a->SKU;
			$row[] = $a->notes;
			$row[] = $a->price;
			$row[] = $a->discount_amount;
			$row[] = $a->subsidi_amount;
			$row[] = $a->customer_name;
			$row[] = $a->customer_phone;
			$row[] = $a->recipient;
			$row[] = $a->recipient_number;
			$row[] = $a->shipping_price_fee;
			$row[] = $a->insurance;
			$row[] = $a->total_shipping_fee;
			$row[] = $a->total_amount;
			$row[] = $a->AWB;
			$row[] = $a->jenis_layanan;
			$row[] = $a->bebas_ongkir;
			$row[] = $a->warehouse_origin;
			$row[] = $a->campaign_name;
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->M_import->count_all(),
			"recordsFiltered" => $this->M_import->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
	function index()
	{
		$data['content'] 		= 'admin/list_transaksi';
		$data['list']			= $this->M_transaksi->transaksi();
		$data['userdata'] 		= $this->userdata;
		$this->load->view($this->template, $data);
	}

	function hapus($params = '')
	{
		$this->M_transaksi->hapus_trx($params);
		$this->session->set_flashdata('sukses', "Berhasil Di Hapus");
		return redirect('Data_transaksi');
	}
}
