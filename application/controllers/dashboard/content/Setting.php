<?php 

class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function tugas_dan_fungsi()
	{
		$data = [];
		$data['tugas_dan_fungsi'] = $this->Varmodel->get('tugas_dan_fungsi');
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/setting/tugas_dan_fungsi', $data, true)
		]);
	}

	public function struktur_organisasi()
	{
		$data = [];
		$data['struktur_organisasi'] = $this->Varmodel->get('struktur_organisasi');
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/setting/struktur_organisasi', $data, true)
		]);
	}

	public function kontak()
	{
		$data = [];
		$query = $this->db->query("SELECT email, phone, fax, address, googlemap_iframe FROM var WHERE id = 1");
		$data['kontak'] = $query->row();
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/setting/kontak', $data, true)
		]);
	}

	public function update()
	{
		$form_data = $_POST;

		$this->db->where('id', 1);
		$update = $this->db->update('var', $form_data);

		if($update){
			$this->session->set_flashdata('message', 'Information Has been Successfully Updated');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}