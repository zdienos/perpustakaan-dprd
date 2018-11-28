<?php 

class Gmd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gmdmodel');
	}

	public function json()
	{

		header('Content-Type: application/json');

		$result = [
			'total' => 0,
			'rows' => []
		];

		$limit          = $this->input->get('limit') ? $this->input->get('limit') : 10;
		$offset         = $this->input->get('offset') ? $this->input->get('offset') : 0;
		$search         = $this->input->get('search') ? $this->input->get('search') : '';
		$sort           = $this->input->get('sort') ? $this->input->get('sort') : '';
		$order          = $this->input->get('order') ? $this->input->get('order') : '';

		$sql = "SELECT
					gmd.id,
					gmd.code,
					gmd.name,
					gmd.created_at,
					gmd.updated_at
				FROM
					gmd ";

		if($search !== ''){
			$sql .= "WHERE 
						gmd.code LIKE '%". $search ."%' OR 
						gmd.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY gmd.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY gmd.id DESC ";
		}

		// echo $sql;

		$query = $this->db->query($sql);
		$result['total'] = $query->num_rows();

		$query = $this->db->query($sql ." LIMIT ". $offset. ", ". $limit);
		$result['rows'] = $query->result();


		echo json_encode($result);

	}

	public function index()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/gmd/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/gmd/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('code', 'code', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [
				$this->input->post('code'),
				$this->input->post('name')
			];
			$insert = $this->db->query("INSERT INTO gmd SET code = ?, name = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/gmd');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['gmd'] = $this->Gmdmodel->find($id);

		if($data['gmd'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/gmd/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('code', 'code', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('code'),
				$this->input->post('name'),
				$id
			];
			$insert = $this->db->query("UPDATE gmd SET code = ?, name = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/gmd');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['gmd'] = $this->Gmdmodel->find($id);

		if($data['gmd'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/gmd/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM gmd WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/gmd');
		}
	}
}