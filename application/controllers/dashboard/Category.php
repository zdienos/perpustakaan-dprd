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
					categories.name
				FROM
					categories ";

		if($search != ''){
			$sql .= "WHERE 
						categories.name LIKE '%". $search ."%' ";
		}

		if($order !== ''){
			$order = " ORDER BY categories.". $sort . " ". $order;
		}else{
			$order = " ORDER BY categories.id DESC ";
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
			'content' => $this->load->view('dashboard/category/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/category/create', $data, true)
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
			$insert = $this->db->query("INSERT INTO categories SET name = ? ", $form_data);

			if($insert){
				redirect('dashboard/category');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['category'] = $this->Categorymodel->find($id);

		if($data['category'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/category/edit', $data, true)
		]);
	}

	public function update()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('name', 'name', 'required');

		$id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('name'),
				$id
			];
			$insert = $this->db->query("UPDATE categories SET name = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/category');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['category'] = $this->Categorymodel->find($id);

		if($data['category'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/category/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM categories WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/category');
		}
	}
}