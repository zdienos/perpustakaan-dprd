<?php 

class Membertype extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Membertypemodel');
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
					membertype.id,
					membertype.name,
					membertype.loan_limit,
					membertype.loan_periode,
					membertype.enable_reserve,
					membertype.reserve_limit,
					membertype.member_periode,
					membertype.reborrow_limit,
					membertype.fine_each_day,
					membertype.grace_periode,
					membertype.created_at,
					membertype.updated_at
				FROM
					membertype ";

		if($search !== ''){
			$sql .= "WHERE 
						membertype.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY membertype.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY membertype.id DESC ";
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
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/membertype/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/membertype/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('loan_limit', 'loan_limit', 'required');
		$this->form_validation->set_rules('loan_periode', 'loan_periode', 'required');
		$this->form_validation->set_rules('enable_reserve', 'enable_reserve', 'required');
		$this->form_validation->set_rules('reserve_limit', 'reserve_limit', 'required');
		$this->form_validation->set_rules('member_periode', 'member_periode', 'required');
		$this->form_validation->set_rules('reborrow_limit', 'reborrow_limit', 'required');
		$this->form_validation->set_rules('fine_each_day', 'fine_each_day', 'required');
		$this->form_validation->set_rules('grace_periode', 'grace_periode', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [				
				$this->input->post('name'),
				$this->input->post('loan_limit'),
				$this->input->post('loan_periode'),
				$this->input->post('enable_reserve'),
				$this->input->post('reserve_limit'),
				$this->input->post('member_periode'),
				$this->input->post('reborrow_limit'),
				$this->input->post('fine_each_day'),
				$this->input->post('grace_periode'),
			];
			$insert = $this->db->query("INSERT INTO membertype SET name = ?, loan_limit = ?, loan_periode = ?, enable_reserve = ?, reserve_limit = ?, member_periode = ?, reborrow_limit = ?, fine_each_day = ?, grace_periode = ? ", $form_data);
			if($insert){
				redirect('dashboard/member/membertype');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['membertype'] = $this->Membertypemodel->find($id);

		if($data['membertype'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/membertype/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('loan_limit', 'loan_limit', 'required');
		$this->form_validation->set_rules('loan_periode', 'loan_periode', 'required');
		$this->form_validation->set_rules('enable_reserve', 'enable_reserve', 'required');
		$this->form_validation->set_rules('reserve_limit', 'reserve_limit', 'required');
		$this->form_validation->set_rules('member_periode', 'member_periode', 'required');
		$this->form_validation->set_rules('reborrow_limit', 'reborrow_limit', 'required');
		$this->form_validation->set_rules('fine_each_day', 'fine_each_day', 'required');
		$this->form_validation->set_rules('grace_periode', 'grace_periode', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [				
				$this->input->post('name'),
				$this->input->post('loan_limit'),
				$this->input->post('loan_periode'),
				$this->input->post('enable_reserve'),
				$this->input->post('reserve_limit'),
				$this->input->post('member_periode'),
				$this->input->post('reborrow_limit'),
				$this->input->post('fine_each_day'),
				$this->input->post('grace_periode'),
				$id
			];
			$insert = $this->db->query("UPDATE membertype SET name = ?, loan_limit = ?, loan_periode = ?, enable_reserve = ?, reserve_limit = ?, member_periode = ?, reborrow_limit = ?, fine_each_day = ?, grace_periode = ?  WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/member/membertype');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['membertype'] = $this->Membertypemodel->find($id);

		if($data['membertype'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/membertype/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM membertype WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/member/membertype');
		}
	}
}