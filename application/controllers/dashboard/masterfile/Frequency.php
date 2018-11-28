<?php 

class Frequency extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frequencymodel');
		$this->load->model('Languagemodel');
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
					frequencies.id,
					frequencies.name,
					frequencies.timeincrement,
					frequencies.timeunit,
					frequencies.created_at,
					frequencies.updated_at
				FROM
					frequencies ";

		if($search !== ''){
			$sql .= "WHERE 
						frequencies.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY frequencies.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY frequencies.id DESC ";
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
			'content' => $this->load->view('dashboard/masterfile/frequency/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$data['languages'] = $this->Languagemodel->all();
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/frequency/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('language_id', 'language_id', 'required');
		$this->form_validation->set_rules('timeincrement', 'timeincrement', 'required');
		$this->form_validation->set_rules('timeunit', 'timeunit', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [				
				$this->input->post('name'),
				$this->input->post('language_id'),
				$this->input->post('timeincrement'),
				$this->input->post('timeunit'),
			];
			$insert = $this->db->query("INSERT INTO frequencies SET name = ?, language_id = ?, timeincrement = ?, timeunit = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/frequency');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['languages'] = $this->Languagemodel->all();
		$data['frequency'] = $this->Frequencymodel->find($id);

		if($data['frequency'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/frequency/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('language_id', 'language_id', 'required');
		$this->form_validation->set_rules('timeincrement', 'timeincrement', 'required');
		$this->form_validation->set_rules('timeunit', 'timeunit', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [				
				$this->input->post('name'),
				$this->input->post('language_id'),
				$this->input->post('timeincrement'),
				$this->input->post('timeunit'),
				$id
			];
			$insert = $this->db->query("UPDATE frequencies SET name = ?, language_id = ?, timeincrement = ?, timeunit = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/frequency');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['frequency'] = $this->Frequencymodel->find($id);

		if($data['frequency'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/frequency/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM frequencies WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/frequency');
		}
	}
}