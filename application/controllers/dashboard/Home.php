<?php 

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => '',
			'content' => $this->load->view('dashboard/home', $data, true)
		]);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('page/admin_login');
	}
}