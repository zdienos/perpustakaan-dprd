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
					authors.id,
					authors.name,
					authors.type,
					authors.created_at,
					authors.updated_at
				FROM
					authors ";

		if($search != ''){
			$sql .= "WHERE 
						authors.name LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY authors.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY authors.id DESC ";
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
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/author/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/author/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [
				$this->input->post('name'),
				$this->input->post('type'),
			];
			$insert = $this->db->query("INSERT INTO authors SET name = ?, type = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/author');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['author'] = $this->Authormodel->find($id);

		if($data['author'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/author/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('name'),
				$this->input->post('type'),
				$id
			];
			$insert = $this->db->query("UPDATE authors SET name = ?, type = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/author');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['author'] = $this->Authormodel->find($id);

		if($data['author'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/author/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM authors WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/author');
		}
	}
}