<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//load Spout Library
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Upload_data extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_import');

		
		
	}
	function index()
	{
		// $data['list']=$this->M_admin->get_data_admin();
		$data['content'] = 'admin/upload';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);	
          
	}
	function tokopedia()
	{
		$data['content'] = 'admin/upload_tokped';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);	
          
	}
	function deposit()
	{
		// $data['list']=$this->M_import->getData();
		$data['content'] = 'admin/import_deposit';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);	
          
	}
	function transaksi()
	{
		// $data['list']=$this->M_admin->get_data_admin();
		$data['content'] = 'admin/import_transaksi';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);	
          
	}
}
