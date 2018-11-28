<?php 

class Collection extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Collectionmodel');
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

		$sql = "SELECT * FROM (
					SELECT
						collections.id,
						collections.catalog_id,
						collections.`code`,
						collections.location_id,
						collections.location_cabinet,
						collections.collectiontype_id,
						collections.collectionstatus_id,
						collections.order_number,
						collections.order_date,
						collections.receipt_date,
						collections.supplier_id,
						collections.invoice,
						collections.invoice_date,
						collections.price,
						collections.created_at,
						collections.updated_at,
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
						locations.`name` AS location,
						collectiontype.`name` AS collectiontype,
						collectionstatus.`name` AS collectionstatus 
					FROM
						collections
						INNER JOIN catalogs ON collections.catalog_id = catalogs.id
						LEFT JOIN locations ON collections.location_id = locations.id
						LEFT JOIN collectiontype ON collections.collectiontype_id = collectiontype.id
						LEFT JOIN collectionstatus ON collections.collectionstatus_id = collectionstatus.id
			) x ";

		if($search != ''){
			$sql .= "WHERE 
						x.code LIKE '%". $search ."%' OR 
						x.title LIKE '%". $search ."%' OR 
						x.location LIKE '%". $search ."%' OR 
						x.collectiontype LIKE '%". $search ."%' OR 
						x.collectionstatus LIKE '%". $search ."%'
						";
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

	public function index()
	{
		$data = [];
		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/collection/index', $data, true)
		]);
	}

	public function create($catalog_id = null)
	{
		$data = [];

		$this->load->model('Catalogmodel');
		$this->load->model('Locationmodel');
		$this->load->model('Collectiontypemodel');
		$this->load->model('Collectionstatusmodel');
		$this->load->model('Suppliermodel');


		$data['selected_catalog'] = !is_null($catalog_id) ? $this->Catalogmodel->find($catalog_id) : false;

		$data['catalogs'] = $this->Catalogmodel->all();
		$data['locations'] = $this->Locationmodel->all();
		$data['collectiontypes'] = $this->Collectiontypemodel->all();
		$data['collectionstatuss'] = $this->Collectionstatusmodel->all();
		$data['suppliers'] = $this->Suppliermodel->all();

		// $data['catalog_id'] = $catalog_id;

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/collection/create', $data, true)
		]);
	}

	public function store()
	{
		
		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');

		$this->form_validation->set_rules('catalog_id', 'catalog_id', 'required');
		$this->form_validation->set_rules('code', 'code', 'required');
		$this->form_validation->set_rules('location_id', 'location_id', 'required');
		// $this->form_validation->set_rules('location_cabinet', 'location_cabinet', 'required');
		$this->form_validation->set_rules('collectiontype_id', 'collectiontype_id', 'required');
		$this->form_validation->set_rules('collectionstatus_id', 'collectionstatus_id', 'required');
		// $this->form_validation->set_rules('order_number', 'order_number', 'required');
		// $this->form_validation->set_rules('order_date', 'order_date', 'required');
		// $this->form_validation->set_rules('receipt_date', 'receipt_date', 'required');
		// $this->form_validation->set_rules('supplier_id', 'supplier_id', 'required');
		// $this->form_validation->set_rules('invoice', 'invoice', 'required');
		// $this->form_validation->set_rules('invoice_date', 'invoice_date', 'required');
		// $this->form_validation->set_rules('price', 'price', 'required');

		if($this->form_validation->run() == false){
			$this->create();
		}else{

			$form_data = [
				'code'                => $this->input->post('code'),
				'location_id'         => $this->input->post('location_id'),
				'location_cabinet'    => $this->input->post('location_cabinet'),
				'collectiontype_id'   => $this->input->post('collectiontype_id'),
				'collectionstatus_id' => $this->input->post('collectionstatus_id'),
				'order_number'        => $this->input->post('order_number'),
				'order_date'          => $this->input->post('order_date'),
				'receipt_date'        => $this->input->post('receipt_date'),
				'supplier_id'         => $this->input->post('supplier_id'),
				'invoice'             => $this->input->post('invoice'),
				'invoice_date'        => $this->input->post('invoice_date'),
				'price'               => $this->input->post('price'),
				'catalog_id'          => $this->input->post('catalog_id'),
				
			];

			$insert = $this->db->insert('collections', $form_data);

			if($insert){
				
				redirect('dashboard/bibliography/collection');
			}
		}
	}


	public function edit($id)
	{
		$data = [];
		$data['collection'] = $this->Collectionmodel->find($id);
		if($data['collection'] == false) show_404();

		$this->load->model('Catalogmodel');
		$this->load->model('Locationmodel');
		$this->load->model('Collectiontypemodel');
		$this->load->model('Collectionstatusmodel');
		$this->load->model('Suppliermodel');

		$data['catalogs'] = $this->Catalogmodel->all();
		$data['locations'] = $this->Locationmodel->all();
		$data['collectiontypes'] = $this->Collectiontypemodel->all();
		$data['collectionstatuss'] = $this->Collectionstatusmodel->all();
		$data['suppliers'] = $this->Suppliermodel->all();

		

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/collection/edit', $data, true)
		]);
	}

	public function update($id)
	{

		$this->form_validation->set_error_delimiters('<p class="text-danger mt-2">', '</p>');
		$this->form_validation->set_rules('catalog_id', 'catalog_id', 'required');
		$this->form_validation->set_rules('code', 'code', 'required');
		$this->form_validation->set_rules('location_id', 'location_id', 'required');
		// $this->form_validation->set_rules('location_cabinet', 'location_cabinet', 'required');
		$this->form_validation->set_rules('collectiontype_id', 'collectiontype_id', 'required');
		$this->form_validation->set_rules('collectionstatus_id', 'collectionstatus_id', 'required');
		// $this->form_validation->set_rules('order_number', 'order_number', 'required');
		// $this->form_validation->set_rules('order_date', 'order_date', 'required');
		// $this->form_validation->set_rules('receipt_date', 'receipt_date', 'required');
		// $this->form_validation->set_rules('supplier_id', 'supplier_id', 'required');
		// $this->form_validation->set_rules('invoice', 'invoice', 'required');
		// $this->form_validation->set_rules('invoice_date', 'invoice_date', 'required');
		// $this->form_validation->set_rules('price', 'price', 'required');

		// $id = $this->input->post('id');

		if($this->form_validation->run() == false){
			$this->edit($id);
		}else{
			$form_data = [
				'code'                => $this->input->post('code'),
				'location_id'         => $this->input->post('location_id'),
				'location_cabinet'    => $this->input->post('location_cabinet'),
				'collectiontype_id'   => $this->input->post('collectiontype_id'),
				'collectionstatus_id' => $this->input->post('collectionstatus_id'),
				'order_number'        => $this->input->post('order_number'),
				'order_date'          => $this->input->post('order_date'),
				'receipt_date'        => $this->input->post('receipt_date'),
				'supplier_id'         => $this->input->post('supplier_id'),
				'invoice'             => $this->input->post('invoice'),
				'invoice_date'        => $this->input->post('invoice_date'),
				'price'               => $this->input->post('price'),
				'catalog_id'          => $this->input->post('catalog_id'),
				
			];

			$this->db->where('id', $id);
			$update = $this->db->update('collections', $form_data);

			if($update){
				redirect('dashboard/bibliography/collection');
			}
		}
	}

	public function delete($id)
	{
		$data = [];
		$data['collection'] = $this->Collectionmodel->find($id);

		if($data['collection'] == false) show_404();

		$this->parser->parse('layouts/dashboard', [
			'submenu' => $this->load->view('dashboard/bibliography/submenu', $data, true),
			'content' => $this->load->view('dashboard/bibliography/collection/delete', $data, true)
		]);
	}

	public function destroy()
	{

		$form_data = [
			$this->input->post('id')
		];
		$insert = $this->db->query("DELETE FROM collections WHERE id = ? ", $form_data);

		if($insert){
			redirect('dashboard/bibliography/collection');
		}
	}
}