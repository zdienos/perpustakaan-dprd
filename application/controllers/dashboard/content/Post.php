<?php 

class Post extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categorymodel');
		$this->load->model('Postmodel');
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
					posts.id,
					posts.title,
					posts.slug,
					posts.content,
					(
						SELECT 
							GROUP_CONCAT(categories.title SEPARATOR ', ') 
						FROM post_categories 
						INNER JOIN categories ON post_categories.category_id = categories.id
						WHERE post_categories.post_id = posts.id 
					) AS categories,
					posts.featured_image,
					posts.created_at,
					posts.updated_at
				FROM
					posts ";

		if($search != ''){
			$sql .= "WHERE 
						posts.title LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY posts.". $sort . " ". $order;
		}else{
			$sql .= " ORDER BY posts.created_at DESC ";
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
			'content' => $this->load->view('dashboard/content/post/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$data['categories'] = $this->Categorymodel->all();
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/post/create', $data, true)
		]);
	}

	public function store()
	{
		
		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('slug', 'slug', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');

		

		if($this->form_validation->run() == false){
			$this->create();
		}else{

			$form_data = [
				'title'          => $this->input->post('title'),
				'slug'           => $this->input->post('slug'),
				'content'        => $this->input->post('content'),
			];


			$config['upload_path']   = './uploads/featured_image';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name']      = 'featured_image-'. date('Ymdhis');

			$this->load->library('upload', $config);

			if($_FILES['featured_image']['size'] > 0){
				if (!$this->upload->do_upload('featured_image')){
					$this->form_validation->set_message('featured_image', $this->upload->display_errors());
				}else{
					$form_data['featured_image'] = $this->upload->data()['file_name'];
	            }
			}


			$insert = $this->db->insert('posts', $form_data);

			if($insert){

				$post_id = $this->db->insert_id();
				$category_ids = $this->input->post('category_ids');
				
				$batch = [];
				foreach($category_ids as $category_id){
					$batch[] = [
						'post_id' => $post_id,
						'category_id' => $category_id,
					];


				}
				if(count($batch) > 0){
					$this->db->insert_batch('post_categories', $batch);
				}
				
				redirect('dashboard/content/post');
			}
		}
	}


	public function edit($id)
	{
		$data = [];
		$data['post'] = $this->Postmodel->find($id);
		$data['categories'] = $this->Categorymodel->all();

		if($data['post'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/post/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('slug', 'slug', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				'title'   => $this->input->post('title'),
				'slug'    => $this->input->post('slug'),
				'content' => $this->input->post('content'),
			];

			$config['upload_path']   = './uploads/featured_image';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name']      = 'featured_image-'. date('Ymdhis');

			$this->load->library('upload', $config);

			if($_FILES['featured_image']['size'] > 0){
				if (!$this->upload->do_upload('featured_image')){
					$this->form_validation->set_message('featured_image', $this->upload->display_errors());
				}else{
					$form_data['featured_image'] = $this->upload->data()['file_name'];
	            }
			}

			$this->db->where('id', $id);
			$update = $this->db->update('posts', $form_data);

			if($update){

				$post_id = $id;
				$category_ids = $this->input->post('category_ids');
				
				$batch = [];
				foreach($category_ids as $category_id){
					$batch[] = [
						'post_id' => $post_id,
						'category_id' => $category_id,
					];
				}
				if(count($batch) > 0){
					$this->db->where('post_id', $post_id);
					$this->db->delete('post_categories');

					$this->db->insert_batch('post_categories', $batch);
				}
				redirect('dashboard/content/post');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['post'] = $this->Postmodel->find($id);

		if($data['post'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/content/submenu', $data, true),
			'content' => $this->load->view('dashboard/content/post/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM posts WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/content/post');
		}
	}
}