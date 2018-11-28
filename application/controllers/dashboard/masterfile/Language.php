<?php 

class Language extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
					languages.id,
					languages.name,
					languages.created_at,
					languages.updated_at
				FROM
					languages ";

		if($search !== ''){
			$sql .= "WHERE 
						languages.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY languages.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY languages.id DESC ";
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
			'content' => $this->load->view('dashboard/masterfile/language/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/language/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('name', 'name', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [				
				$this->input->post('name')
			];
			$insert = $this->db->query("INSERT INTO languages SET name = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/language');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['language'] = $this->Languagemodel->find($id);

		if($data['language'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/language/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('name', 'name', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [				
				$this->input->post('name'),
				$id
			];
			$insert = $this->db->query("UPDATE languages SET name = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/language');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['language'] = $this->Languagemodel->find($id);

		if($data['language'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/language/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM languages WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/language');
		}
	}
}