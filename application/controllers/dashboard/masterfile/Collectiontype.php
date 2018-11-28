<?php 

class Collectiontype extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Collectiontypemodel');
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
					collectiontype.id,
					collectiontype.name,
					collectiontype.created_at,
					collectiontype.updated_at
				FROM
					collectiontype ";

		if($search !== ''){
			$sql .= "WHERE 
						collectiontype.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY collectiontype.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY collectiontype.id DESC ";
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
			'content' => $this->load->view('dashboard/masterfile/collectiontype/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/collectiontype/create', $data, true)
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
			$insert = $this->db->query("INSERT INTO collectiontype SET name = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/collectiontype');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['collectiontype'] = $this->Collectiontypemodel->find($id);

		if($data['collectiontype'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/collectiontype/edit', $data, true)
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
			$insert = $this->db->query("UPDATE collectiontype SET name = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/collectiontype');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['collectiontype'] = $this->Collectiontypemodel->find($id);

		if($data['collectiontype'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/collectiontype/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM collectiontype WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/collectiontype');
		}
	}
}