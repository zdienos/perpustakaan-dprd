<?php 

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Collectionmodel');
		$this->load->model('Collectioncategorymodel');
		$this->load->model('Postmodel');
		$this->load->model('Catalogmodel');
	}

	public function index()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['latest_posts'] = $this->Postmodel->get_latest(5);
		$data['pengumuman_posts'] = $this->Postmodel->get_by_category_id(19);
		$data['artikel_posts'] = $this->Postmodel->get_by_category_id(20);

		$data['catalogs'] = $this->Catalogmodel->get_latest(10);
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/home', $data, true)
		]);
	}

	public function informasi()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['latest_posts'] = $this->Postmodel->get_latest(5);
		$data['pengumuman_posts'] = $this->Postmodel->get_by_category_id(19);
		$data['artikel_posts'] = $this->Postmodel->get_by_category_id(20);

		$data['catalogs'] = $this->Catalogmodel->get_latest(10);
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/informasi', $data, true)
		]);
	}

	public function json_katalog()
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

		$sql = "SELECT * FROM (
					SELECT
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
						catalogs.created_at,
						catalogs.updated_at,
						gmd.`name` AS gmd,
						`authors`.`name` AS author,
						publishers.`name` AS publisher,
						languages.`name` AS `language`,
						(SELECT COUNT(*) FROM collections WHERE collections.catalog_id = catalogs.id) AS collection_number,
						(
							SELECT
							GROUP_CONCAT(CONCAT(locations.`name`, ' (', collections.location_cabinet ,')') SEPARATOR ', ')
							FROM
							collections
							INNER JOIN locations ON collections.location_id = locations.id
							WHERE collections.catalog_id = catalogs.id
						) AS location

					FROM
						catalogs
					LEFT JOIN gmd ON catalogs.gmd_id = gmd.id
					LEFT JOIN `authors` ON catalogs.author_id = gmd.id
					LEFT JOIN publishers ON catalogs.publisher_id = publishers.id
					LEFT JOIN languages ON catalogs.language_id = languages.id 
				) x ";

		if($search != ''){
			$sql .= "WHERE 
						x.title LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY x.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY x.id DESC ";
		}


		$query = $this->db->query($sql);
		$result['total'] = $query->num_rows();

		$query = $this->db->query($sql ." LIMIT ". $offset. ", ". $limit);
		$result['rows'] = $query->result();


		echo json_encode($result);

	}

	public function katalog()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['latest_posts'] = $this->Postmodel->get_latest(5);
		$data['pengumuman_posts'] = $this->Postmodel->get_by_category_id(19);
		$data['artikel_posts'] = $this->Postmodel->get_by_category_id(20);

		$data['catalogs'] = $this->Catalogmodel->get_latest(10);
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/katalog', $data, true)
		]);
	}

	public function katalog_detail($id)
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['latest_posts'] = $this->Postmodel->get_latest(5);
		$data['pengumuman_posts'] = $this->Postmodel->get_by_category_id(19);
		$data['artikel_posts'] = $this->Postmodel->get_by_category_id(20);
		
		$data['catalogs'] = $this->Catalogmodel->get_latest(10);

		$data['catalog'] = $this->Catalogmodel->find($id);
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/katalog_detail', $data, true)
		]);
	}

	public function katalog_pdf($id)
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['latest_posts'] = $this->Postmodel->get_latest(5);
		$data['pengumuman_posts'] = $this->Postmodel->get_by_category_id(19);
		$data['artikel_posts'] = $this->Postmodel->get_by_category_id(20);
		
		$data['catalogs'] = $this->Catalogmodel->get_latest(10);

		$data['catalog'] = $this->Catalogmodel->find($id);
		$this->parser->parse('layouts/page', [
		'content' => $this->load->view('pages/katalog_pdf', $data, true)
		]);
	}

	public function posts()
	{
		$this->load->library('pagination');	

	  	$data = [];

        $limit_per_page = 6;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Postmodel->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $data["results"] = $this->Postmodel->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
			$config['base_url']    = base_url() . 'page/posts';
			$config['total_rows']  = $total_records;
			$config['per_page']    = $limit_per_page;
			$config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';
 
            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';

            $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
			$config['full_tag_close'] 	= '</ul></nav></div>';
			$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] 	= '</span></li>';
			$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close'] 	= '</span></li>';
			$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close'] 	= '</span></li>';

             
            $this->pagination->initialize($config);
                 
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

        $data['latest_posts'] = $this->Postmodel->get_latest(5);

        $this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/posts', $data, true)
		]);
	}

	public function post($slug)
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['post'] = $this->Postmodel->find_by_slug($slug);
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/post', $data, true)
		]);
	}

	public function tugas_dan_fungsi()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['tugas_dan_fungsi'] = $this->Varmodel->get('tugas_dan_fungsi');
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/tugas_dan_fungsi', $data, true)
		]);
	}

	public function struktur_organisasi()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['struktur_organisasi'] = $this->Varmodel->get('struktur_organisasi');
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/struktur_organisasi', $data, true)
		]);
	}

	public function kontak()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$query = $this->db->query("SELECT email, phone, fax, address, googlemap_iframe FROM var WHERE id = 1");
		$data['kontak'] = $query->row();
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/kontak', $data, true)
		]);
	}

	public function buku_tamu()
	{
		$data = [];
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/buku_tamu', $data, true)
		]);
	}

	public function login()
	{
		$data = [];
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/login', $data, true)
		]);
	}

	public function member_logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}


	public function member_login($error = null)
	{
		$data = [];
		if($error){
			$data['message'] = 'Kombinasi email dan password salah!';
		}
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/member_login', $data, true)
		]);
	}

	public function submit_member_login()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == false){
			$this->member_login();
		}else{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$query = $this->db->query("SELECT * FROM members WHERE email = ? AND password = ?", [$email, $password]);
			if($query->num_rows() > 0){
				$member = $query->row();
				$this->session->set_userdata('perpustakaan_member', $member);
				redirect('/');
				// redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->member_login(1);
			}
		}
	}

	public function session()
	{
		print_r($_SESSION);
	}

	public function admin_login($error = null)
	{
		$data = [];
		if($error){
			$data['message'] = 'Kombinasi email dan password salah!';
		}
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/admin_login', $data, true)
		]);
	}

	public function submit_admin_login()
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == false){
			$this->admin_login();
		}else{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$query = $this->db->query("SELECT * FROM administrators WHERE email = ? AND password = ?", [$email, $password]);
			if($query->num_rows() > 0){
				$administrator = $query->row();
				$this->session->set_userdata('perpustakaan_administrator', $administrator);
				redirect('dashboard/bibliography/catalog');
			}else{
				$this->admin_login(1);
			}
		}
	}

	public function json_ebook()
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

		$sql = "SELECT * FROM (
					SELECT
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
						catalogs.created_at,
						catalogs.updated_at,
						gmd.`name` AS gmd,
						`authors`.`name` AS author,
						publishers.`name` AS publisher,
						languages.`name` AS `language`,
						(SELECT COUNT(*) FROM collections WHERE collections.catalog_id = catalogs.id) AS collection_number,
						(
							SELECT
							GROUP_CONCAT(CONCAT(locations.`name`, ' (', collections.location_cabinet ,')') SEPARATOR ', ')
							FROM
							collections
							INNER JOIN locations ON collections.location_id = locations.id
							WHERE collections.catalog_id = catalogs.id
						) AS location

					FROM
						catalogs
					LEFT JOIN gmd ON catalogs.gmd_id = gmd.id
					LEFT JOIN `authors` ON catalogs.author_id = gmd.id
					LEFT JOIN publishers ON catalogs.publisher_id = publishers.id
					LEFT JOIN languages ON catalogs.language_id = languages.id 
					WHERE pdf_file IS NOT NULL 
				) x ";

		if($search != ''){
			$sql .= "WHERE 
						x.title LIKE '%". $search ."%' ";
		}

		if($sort !== ''){
			$sql .= " ORDER BY x.". $sort . " ". $order . " ";
		}else{
			$sql .= " ORDER BY x.id DESC ";
		}


		$query = $this->db->query($sql);
		$result['total'] = $query->num_rows();

		$query = $this->db->query($sql ." LIMIT ". $offset. ", ". $limit);
		$result['rows'] = $query->result();


		echo json_encode($result);

	}

	public function ebook()
	{
		$data = [];
		$data['categories'] = $this->Collectioncategorymodel->all();
		$data['latest_posts'] = $this->Postmodel->get_latest(5);
		$data['pengumuman_posts'] = $this->Postmodel->get_by_category_id(19);
		$data['artikel_posts'] = $this->Postmodel->get_by_category_id(20);

		$data['catalogs'] = $this->Catalogmodel->get_latest(10);
		$this->parser->parse('layouts/page', [
			'content' => $this->load->view('pages/ebook', $data, true)
		]);
	}
}