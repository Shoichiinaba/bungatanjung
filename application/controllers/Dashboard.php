<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['content'] 		= 'admin/home';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

}
