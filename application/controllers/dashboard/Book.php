<?php 

class Book extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bookmodel');
		$this->load->model('Authormodel');
		$this->load->model('Publishermodel');
		$this->load->model('Languagemodel');
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
					*
				FROM
					(
						SELECT
							books.id,
							books.title,
							books.isbn_issn,
							books.author_id,
							books.publisher_id,
							books.language_id,
							books.category_id,
							books.topic,
							books.publication_year,
							books.cover_img,
							books.pdf_file,
							books.created_at,
							books.updated_at,
							`authors`.first_name,
							`authors`.middle_name,
							`authors`.last_name,
							`authors`.biography,
							publishers.`name` AS publisher,
							languages.`name` AS `language`,
							categories.`name` AS category
						FROM
							books
						LEFT JOIN `authors` ON books.author_id = `authors`.id
						LEFT JOIN publishers ON books.publisher_id = publishers.id
						LEFT JOIN languages ON books.language_id = languages.id
						LEFT JOIN categories ON books.category_id = categories.id

					) x ";

		if($search != ''){
			$sql .= "WHERE 
						x.title LIKE '%". $search ."%' ";
		}

		if($order !== ''){
			$order = " ORDER BY x.". $sort . " ". $order;
		}else{
			$order = " ORDER BY x.id DESC ";
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
			'content' => $this->load->view('dashboard/book/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$data['authors'] = $this->Authormodel->all();
		$data['publishers'] = $this->Publishermodel->all();
		$data['languages'] = $this->Languagemodel->all();
		$data['categories'] = $this->Categorymodel->all();
		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/book/create', $data, true)
		]);
	}

	public function store()
	{

		print_r($_FILES);
		die();

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('isbn_issn', 'isbn_issn', 'required');
		// $this->form_validation->set_rules('author_id', 'author_id', 'required');
		// $this->form_validation->set_rules('publisher_id', 'publisher_id', 'required');
		// $this->form_validation->set_rules('language_id', 'language_id', 'required');
		// $this->form_validation->set_rules('category_id', 'category_id', 'required');
		// $this->form_validation->set_rules('topic', 'topic', 'required');
		// $this->form_validation->set_rules('publication_year', 'publication_year', 'required');
		// $this->form_validation->set_rules('cover_img', 'cover_img', 'required');
		// $this->form_validation->set_rules('pdf_file', 'pdf_file', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{
			$form_data = [
				$this->input->post('title')
			];
			$insert = $this->db->query("INSERT INTO books SET title = ? ", $form_data);

			$id = $this->db->insert_id();



			if($insert){
				redirect('dashboard/book');
			}
		}
	}

	public function edit($id)
	{
		$data = [];
		$data['book'] = $this->Bookmodel->find($id);

		if($data['book'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/book/edit', $data, true)
		]);
	}

	public function update()
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');

		$id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				$this->input->post('title'),
				$id
			];
			$insert = $this->db->query("UPDATE books SET title = ? WHERE id = ? ", $form_data);

			if($insert){
				redirect('dashboard/book');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['book'] = $this->Bookmodel->find($id);

		if($data['book'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'content' => $this->load->view('dashboard/book/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM books WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/book');
		}
	}
}