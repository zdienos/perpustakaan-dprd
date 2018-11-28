<?php 

class Location extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Locationmodel');
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
					locations.id,
					locations.code,
					locations.name,
					locations.created_at,
					locations.updated_at
				FROM
					locations ";

		if($search !== ''){
			$sql .= "WHERE 
						locations.code LIKE '%". $search ."%' OR 
						locations.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY locations.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY locations.id DESC ";
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
			'content' => $this->load->view('dashboard/masterfile/location/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/location/create', $data, true)
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
			$insert = $this->db->query("INSERT INTO locations SET code = ?, name = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/location');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['location'] = $this->Locationmodel->find($id);

		if($data['location'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/location/edit', $data, true)
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
			$insert = $this->db->query("UPDATE locations SET code = ?, name = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/location');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['location'] = $this->Locationmodel->find($id);

		if($data['location'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/location/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM locations WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/location');
		}
	}
}