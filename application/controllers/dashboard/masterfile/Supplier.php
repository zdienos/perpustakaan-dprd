<?php 

class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Suppliermodel');
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
					suppliers.id,
					suppliers.name,
					suppliers.address,
					suppliers.contact,
					suppliers.phone,
					suppliers.fax,
					suppliers.account
				FROM
					suppliers ";

		if($search != ''){
			$sql .= "WHERE 
						suppliers.name LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY suppliers.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY suppliers.id DESC ";
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
			'content' => $this->load->view('dashboard/masterfile/supplier/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/supplier/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('name', 'name', 'required');
		// $this->form_validation->set_rules('address', 'address', 'required');
		// $this->form_validation->set_rules('contact', 'contact', 'required');
		// $this->form_validation->set_rules('phone', 'phone', 'required');
		// $this->form_validation->set_rules('fax', 'fax', 'required');
		// $this->form_validation->set_rules('account', 'account', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [
				$this->input->post('name'),
				$this->input->post('address'),
				$this->input->post('contact'),
				$this->input->post('phone'),
				$this->input->post('fax'),
				$this->input->post('account'),
			];
			$insert = $this->db->query("INSERT INTO suppliers SET name = ?, address = ?, contact = ?, phone = ?, fax = ?, account = ?  ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/supplier');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['supplier'] = $this->Suppliermodel->find($id);

		if($data['supplier'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/supplier/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('name', 'name', 'required');
		// $this->form_validation->set_rules('address', 'address', 'required');
		// $this->form_validation->set_rules('contact', 'contact', 'required');
		// $this->form_validation->set_rules('phone', 'phone', 'required');
		// $this->form_validation->set_rules('fax', 'fax', 'required');
		// $this->form_validation->set_rules('account', 'account', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('name'),
				$this->input->post('address'),
				$this->input->post('contact'),
				$this->input->post('phone'),
				$this->input->post('fax'),
				$this->input->post('account'),
				$id
			];
			$insert = $this->db->query("UPDATE suppliers SET name = ?, address = ?, contact = ?, phone = ?, fax = ?, account = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/masterfile/supplier');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['supplier'] = $this->Suppliermodel->find($id);

		if($data['supplier'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/masterfile/submenu', $data, true),
			'content' => $this->load->view('dashboard/masterfile/supplier/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM suppliers WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/masterfile/supplier');
		}
	}
}