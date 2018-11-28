<?php 

class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categorymodel');
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
					categories.id,
					categories.title,
					categories.slug,
					categories.created_at,
					categories.updated_at
				FROM
					categories ";

		if($search != ''){
			$sql .= "WHERE 
						categories.title LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY categories.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY categories.id DESC ";
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
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/category/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/category/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('slug', 'slug', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [
				$this->input->post('title'),
				$this->input->post('slug'),
			];
			$insert = $this->db->query("INSERT INTO categories SET title = ?, slug = ? ", $form_data);

			if($insert){
				redirect('dashboard/content/category');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['category'] = $this->Categorymodel->find($id);

		if($data['category'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/category/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('slug', 'slug', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('title'),
				$this->input->post('slug'),
				$id
			];
			$insert = $this->db->query("UPDATE categories SET title = ?, slug = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/content/category');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['category'] = $this->Categorymodel->find($id);

		if($data['category'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/category/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM categories WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/content/category');
		}
	}
}