<?php 

class Catalog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Catalogmodel');
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
					catalogs.id,
					catalogs.title,
					catalogs.edition,
					catalogs.detail,
					catalogs.gmd_id,
					catalogs.isbn,
					catalogs.author_id,
					catalogs.publisher_id,
					catalogs.publication_year,
					catalogs.publication_place_id,
					catalogs.`collation`,
					catalogs.series_title,
					catalogs.language_id,
					catalogs.note,
					catalogs.cover_image,
					catalogs.pdf_file,
					(SELECT COUNT(*) FROM collections WHERE collections.catalog_id = catalogs.id) AS collection_number,
					catalogs.created_at,
					catalogs.updated_at 
				FROM
					catalogs ";

		if($search != ''){
			$sql .= "WHERE 
						catalogs.title LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY catalogs.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY catalogs.id DESC ";
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
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/catalog/index', $data, true)
		]);
	}

	public function create()
	{
		$data = [];
		$this->load->model('Gmdmodel');
		$data['gmd'] = $this->Gmdmodel->all();
		$this->load->model('Authormodel');
		$data['authors'] = $this->Authormodel->all();
		$this->load->model('Publishermodel');
		$data['publishers'] = $this->Publishermodel->all();
		$this->load->model('Placemodel');
		$data['places'] = $this->Placemodel->all();
		$this->load->model('Languagemodel');
		$data['languages'] = $this->Languagemodel->all();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/catalog/create', $data, true)
		]);
	}

	public function store()
	{
		
		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');
		// $this->form_validation->set_rules('edition', 'edition', 'required');
		// $this->form_validation->set_rules('detail', 'detail', 'required');
		$this->form_validation->set_rules('gmd_id', 'gmd_id', 'required');
		$this->form_validation->set_rules('isbn', 'isbn', 'required');
		$this->form_validation->set_rules('author_id', 'author_id', 'required');
		$this->form_validation->set_rules('publisher_id', 'publisher_id', 'required');
		$this->form_validation->set_rules('publication_year', 'publication_year', 'required');
		// $this->form_validation->set_rules('publication_place_id', 'publication_place_id', 'required');
		// $this->form_validation->set_rules('collation', 'collation', 'required');
		// $this->form_validation->set_rules('series_title', 'series_title', 'required');
		$this->form_validation->set_rules('language_id', 'language_id', 'required');
		// $this->form_validation->set_rules('note', 'note', 'required');
		// $this->form_validation->set_rules('cover_img', 'cover_img', 'required');
		// $this->form_validation->set_rules('cover_img', 'cover_img', 'required');

		/*
		title
		edition
		detail
		gmd_id
		isbn
		publisher_id
		publication_year
		publication_place_id
		collation
		series_title
		language_id
		note
		cover_img
		*/
		

		if($this->form_validation->run() == false){
			$this->create();
		}else{

			$form_data = [
				'title'                => $this->input->post('title'),
				'edition'              => $this->input->post('edition'),
				'detail'               => $this->input->post('detail'),
				'gmd_id'               => $this->input->post('gmd_id'),
				'isbn'                 => $this->input->post('isbn'),
				'publisher_id'         => $this->input->post('publisher_id'),
				'publication_year'     => $this->input->post('publication_year'),
				'publication_place_id' => $this->input->post('publication_place_id'),
				'collation'            => $this->input->post('collation'),
				'series_title'         => $this->input->post('series_title'),
				'language_id'          => $this->input->post('language_id'),
				'note'                 => $this->input->post('note'),
			];


			$config['upload_path']   = './uploads/book';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
			$config['file_name']      = 'book-'. date('Ymdhis');

			$this->load->library('upload', $config);

			if(isset($_FILES['cover_image']) AND $_FILES['cover_image']['size'] > 0){
				if (!$this->upload->do_upload('cover_image')){
					$this->form_validation->set_message('cover_image', $this->upload->display_errors());
				}else{
					$form_data['cover_image'] = $this->upload->data()['file_name'];
	            }
			}

			if(isset($_FILES['pdf_file']) AND $_FILES['pdf_file']['size'] > 0){
				if (!$this->upload->do_upload('pdf_file')){
					$this->form_validation->set_message('pdf_file', $this->upload->display_errors());
				}else{
					$form_data['pdf_file'] = $this->upload->data()['file_name'];
	            }
			}

			

			$insert = $this->db->insert('catalogs', $form_data);

			if($insert){
				
				redirect('dashboard/bibliography/catalog');
			}
		}
	}


	public function edit($id)
	{
		$data = [];
		$data['catalog'] = $this->Catalogmodel->find($id);

		if($data['catalog'] == false) show_404();


		$this->load->model('Gmdmodel');
		$data['gmd'] = $this->Gmdmodel->all();
		$this->load->model('Authormodel');
		$data['authors'] = $this->Authormodel->all();
		$this->load->model('Publishermodel');
		$data['publishers'] = $this->Publishermodel->all();
		$this->load->model('Placemodel');
		$data['places'] = $this->Placemodel->all();
		$this->load->model('Languagemodel');
		$data['languages'] = $this->Languagemodel->all();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/catalog/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('title', 'title', 'required');
		// $this->form_validation->set_rules('edition', 'edition', 'required');
		// $this->form_validation->set_rules('detail', 'detail', 'required');
		$this->form_validation->set_rules('gmd_id', 'gmd_id', 'required');
		$this->form_validation->set_rules('isbn', 'isbn', 'required');
		$this->form_validation->set_rules('author_id', 'author_id', 'required');
		$this->form_validation->set_rules('publisher_id', 'publisher_id', 'required');
		$this->form_validation->set_rules('publication_year', 'publication_year', 'required');
		// $this->form_validation->set_rules('publication_place_id', 'publication_place_id', 'required');
		// $this->form_validation->set_rules('collation', 'collation', 'required');
		// $this->form_validation->set_rules('series_title', 'series_title', 'required');
		$this->form_validation->set_rules('language_id', 'language_id', 'required');
		// $this->form_validation->set_rules('note', 'note', 'required');
		// $this->form_validation->set_rules('cover_img', 'cover_img', 'required');
		// $this->form_validation->set_rules('cover_img', 'cover_img', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				'title'                => $this->input->post('title'),
				'edition'              => $this->input->post('edition'),
				'detail'               => $this->input->post('detail'),
				'gmd_id'               => $this->input->post('gmd_id'),
				'isbn'                 => $this->input->post('isbn'),
				'publisher_id'         => $this->input->post('publisher_id'),
				'publication_year'     => $this->input->post('publication_year'),
				'publication_place_id' => $this->input->post('publication_place_id'),
				'collation'            => $this->input->post('collation'),
				'series_title'         => $this->input->post('series_title'),
				'language_id'          => $this->input->post('language_id'),
				'note'                 => $this->input->post('note'),
			];


			$config['upload_path']   = './uploads/book';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
			$config['file_name']      = 'book-'. date('Ymdhis');

			$this->load->library('upload', $config);

			if(isset($_FILES['cover_image']) AND $_FILES['cover_image']['size'] > 0){
				if (!$this->upload->do_upload('cover_image')){
					$this->form_validation->set_message('cover_image', $this->upload->display_errors());
				}else{
					$form_data['cover_image'] = $this->upload->data()['file_name'];
	            }
			}

			if(isset($_FILES['pdf_file']) AND $_FILES['pdf_file']['size'] > 0){
				if (!$this->upload->do_upload('pdf_file')){
					$this->form_validation->set_message('pdf_file', $this->upload->display_errors());
				}else{
					$form_data['pdf_file'] = $this->upload->data()['file_name'];
	            }
			}
			$this->db->where('id', $id);
			$update = $this->db->update('catalogs', $form_data);

			if($update){
				redirect('dashboard/bibliography/catalog');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['catalog'] = $this->Catalogmodel->find($id);

		if($data['catalog'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/catalog/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM catalogs WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/bibliography/catalog');
		}
	}
}