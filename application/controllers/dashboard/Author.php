<?php 

class Author extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authormodel');
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
					`authors`.id,
					`authors`.first_name,
					`authors`.middle_name,
					`authors`.last_name,
					`authors`.biography,
					`authors`.created_at,
					`authors`.updated_at
				FROM
					authors ";



		
		
		
		
		
		
		if($search != ''){
			$sql .= "WHERE 
						authors.first_name LIKE '%". $search ."%' OR 
						authors.middle_name LIKE '%". $search ."%' OR 
						authors.last_name LIKE '%". $search ."%' ";
		}

		if($order !== ''){
			$order = " ORDER BY authors.". $sort . " ". $order;
		}else{
			$order = " ORDER BY authors.id DESC ";
		}

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
			'content' => $this->load->view('dashboard/author/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/author/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
		// $this->form_validation->set_rules('middle_name', 'middle_name', 'required');
		// $this->form_validation->set_rules('last_name', 'last_name', 'required');
		// $this->form_validation->set_rules('biography', 'biography', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [
				$this->input->post('first_name'),
				$this->input->post('middle_name'),
				$this->input->post('last_name'),
				$this->input->post('biography'),
			];
			$insert = $this->db->query("INSERT INTO authors SET first_name = ?, middle_name = ?, last_name = ?, biography = ? ", $form_data);

			if($insert){
				redirect('dashboard/author');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['author'] = $this->Authormodel->find($id);

		if($data['author'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/author/edit', $data, true)
		]);
	}

	public function update()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
		// $this->form_validation->set_rules('middle_name', 'middle_name', 'required');
		// $this->form_validation->set_rules('last_name', 'last_name', 'required');
		// $this->form_validation->set_rules('biography', 'biography', 'required');

		$id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('first_name'),
				$this->input->post('middle_name'),
				$this->input->post('last_name'),
				$this->input->post('biography'),
				$id
			];
			$insert = $this->db->query("UPDATE authors SET first_name = ?, middle_name = ?, last_name = ?, biography = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/author');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['author'] = $this->Authormodel->find($id);

		if($data['author'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/author/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM authors WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/author');
		}
	}
}