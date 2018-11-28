<?php 

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Membermodel');
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
					members.id,
					members.name,
					members.created_at,
					members.updated_at
				FROM
					members ";

		if($search !== ''){
			$sql .= "WHERE 
						members.name LIKE '%". $search ."%' ";
		}


		if($sort !== ''){
			$sql .= " ORDER BY members.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY members.id DESC ";
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
			'content' => $this->load->view('dashboard/member/member/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$data['membertypes'] = $this->Membertypemodel->all();
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/member/create', $data, true)
		]);
	}

	public function store()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('member_id', 'member_id', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');
		// $this->form_validation->set_rules('birthday', 'birthday', 'required');
		$this->form_validation->set_rules('expired_at', 'expired_at', 'required');
		// $this->form_validation->set_rules('institution', 'institution', 'required');
		$this->form_validation->set_rules('membertype_id', 'membertype_id', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		// $this->form_validation->set_rules('postalcode', 'postalcode', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		// $this->form_validation->set_rules('fax', 'fax', 'required');
		$this->form_validation->set_rules('identity_number', 'identity_number', 'required');
		// $this->form_validation->set_rules('notes', 'notes', 'required');
		// $this->form_validation->set_rules('photo', 'photo', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [			
				'member_id'       => $this->input->post('member_id'),
				'name'            => $this->input->post('name'),
				'birthday'        => $this->input->post('birthday'),
				'expired_at'      => $this->input->post('expired_at'),
				'institution'     => $this->input->post('institution'),
				'membertype_id'   => $this->input->post('membertype_id'),
				'gender'          => $this->input->post('gender'),
				'address'         => $this->input->post('address'),
				'postalcode'      => $this->input->post('postalcode'),
				'phone'           => $this->input->post('phone'),
				'fax'             => $this->input->post('fax'),
				'identity_number' => $this->input->post('identity_number'),
				'notes'           => $this->input->post('notes'),
				// 'photo'           => $this->input->post('photo'),
				'email'           => $this->input->post('email'),
				'password'        => md5($this->input->post('password')),	
			];


			

			$config['upload_path']   = './uploads/photo';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name']      = 'photo-'. date('Ymdhis');

			$this->load->library('upload', $config);

			if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0){
				if (!$this->upload->do_upload('photo')){
					$this->form_validation->set_message('photo', $this->upload->display_errors());
				}else{
					$form_data['photo'] = $this->upload->data()['file_name'];
	            }
			}
			$insert = $this->db->insert('members', $form_data);

			if($insert){
				redirect('dashboard/member/member');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['membertypes'] = $this->Membertypemodel->all();
		$data['member'] = $this->Membermodel->find($id);

		if($data['member'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/member/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');		
		$this->form_validation->set_rules('member_id', 'member_id', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');
		// $this->form_validation->set_rules('birthday', 'birthday', 'required');
		$this->form_validation->set_rules('expired_at', 'expired_at', 'required');
		// $this->form_validation->set_rules('institution', 'institution', 'required');
		$this->form_validation->set_rules('membertype_id', 'membertype_id', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		// $this->form_validation->set_rules('postalcode', 'postalcode', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		// $this->form_validation->set_rules('fax', 'fax', 'required');
		$this->form_validation->set_rules('identity_number', 'identity_number', 'required');
		// $this->form_validation->set_rules('notes', 'notes', 'required');
		// $this->form_validation->set_rules('photo', 'photo', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		// $this->form_validation->set_rules('password', 'password', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [			
				'member_id'       => $this->input->post('member_id'),
				'name'            => $this->input->post('name'),
				'birthday'        => $this->input->post('birthday'),
				'expired_at'      => $this->input->post('expired_at'),
				'institution'     => $this->input->post('institution'),
				'membertype_id'   => $this->input->post('membertype_id'),
				'gender'          => $this->input->post('gender'),
				'address'         => $this->input->post('address'),
				'postalcode'      => $this->input->post('postalcode'),
				'phone'           => $this->input->post('phone'),
				'fax'             => $this->input->post('fax'),
				'identity_number' => $this->input->post('identity_number'),
				'notes'           => $this->input->post('notes'),
				// 'photo'           => $this->input->post('photo'),
				'email'           => $this->input->post('email'),
				// 'password'        => md5($this->input->post('password')),	
			];

			$config['upload_path']   = './uploads/photo';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name']      = 'photo-'. date('Ymdhis');

			$this->load->library('upload', $config);

			if(isset($_POST['password']) AND !empty($_POST['password'])){
				$form_data['password'] = md5($this->input->post('password'));
			}

			if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0){
				if (!$this->upload->do_upload('photo')){
					$this->form_validation->set_message('photo', $this->upload->display_errors());
				}else{
					$form_data['photo'] = $this->upload->data()['file_name'];
	            }
			}
			$this->db->where('id', $id);
			$update = $this->db->update('members', $form_data);
			// $update = $this->db->query("UPDATE members SET name = ? WHERE id = ? ", $form_data);

			if($update){
				redirect('dashboard/member/member');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['member'] = $this->Membermodel->find($id);

		if($data['member'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/member/submenu', $data, true),
			'content' => $this->load->view('dashboard/member/member/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM members WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/member/member');
		}
	}
}