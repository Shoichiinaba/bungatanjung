<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//load Spout Library
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Upload_data extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_import');
	}
	function index()
	{
		// $data['list']=$this->M_admin->get_data_admin();
		$data['content'] = 'admin/upload';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);

	}

	function list_toko()
	{
		$data['list']=$this->M_import->get_pedia();
		$data['nomer']= $this->M_import->TOKPED();
		$data['content'] = 'admin/daftar_toko';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);

	}

	function list_toko_shope()
	{
		$data['list']=$this->M_import->get_Shope();
		$data['nomer']= $this->M_import->Shope();
		$data['content'] = 'admin/daftar_toko_shope';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);

	}


	function tokopedia($param = '')
	{
		$data['content'] = 'admin/upload_tokped';
		$data['userdata'] 	= $this->userdata;
		$this->session->set_userdata(array("id_toko" => $param));
		$this->load->view($this->template, $data);

	}
	function deposit()
	{
		// $data['list']=$this->M_import->getData();
		$data['content'] = 'admin/import_deposit';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);

	}
	function transaksi() // brati seng iki rk perlu mas mksude rk perlu gawe session ng kene
	{
		// $data['list']=$this->M_admin->get_data_admin();
		// $data['content'] = 'admin/import_transaksi';
		// $data['userdata'] 	= $this->userdata;
		// $this->load->view($this->template, $data);

		$data['content'] = 'admin/import_transaksi';
		$data['userdata'] 	= $this->userdata;
		// $this->session->set_userdata(array("id_toko" => $param));
		$this->load->view($this->template, $data);
	}

	function temp_upload($id_toko='')
	{
		$data['list']=$this->M_import->get_data_temp($id_toko);
		$data['content'] = 'admin/temp_upload';
		$data['userdata'] 	= $this->userdata;
		$data['format_number'] = function($number){
			return number_format($number, 2, ',', '.');
		};
		$this->load->view($this->template, $data);

	}

	function delete_temp($params = '') {
        $this->M_import->delete_temp($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Upload_data/temp_upload');
    }

	function delete($params = '') {
        $this->M_import->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Upload_data/list_toko');
    }

	function delete_shope($params = '') {
        $this->M_import->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Upload_data/list_toko_shope');
    }

	function tambah_tokped()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Simpan");
			redirect('Upload_data/list_toko');
		}else{
				$Id_toko=$this->input->post('Id_toko');
				$id_MP= 1;
				$Nama_toko=$this->input->post('Nama_toko');
				$keterangan=$this->input->post('keterangan');
			}
		$this->M_import->tambah_tokped($Id_toko,$id_MP,$Nama_toko,$keterangan);
		$this->session->set_flashdata('sukses'," Berhasil Diinput");
		redirect('Upload_data/list_toko');
	}
	function tambah_shope()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Simpan");
			redirect('Upload_data/list_toko_shope');
		}else{
				$Id_toko=$this->input->post('Id_toko');
				$id_MP= 2;
				$Nama_toko=$this->input->post('Nama_toko');
				$keterangan=$this->input->post('keterangan');
			}
		$this->M_import->tambah_tokped($Id_toko,$id_MP,$Nama_toko,$keterangan);
		$this->session->set_flashdata('sukses'," Berhasil Diinput");
		redirect('Upload_data/list_toko_shope');
	}
}
