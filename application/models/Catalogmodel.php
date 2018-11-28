<?php 

class Catalogmodel extends CI_Model
{
	private $main_sql = "SELECT
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
								(SELECT COUNT(*) FROM collections WHERE collections.catalog_id = catalogs.id) AS collection_number
							FROM
								catalogs
							LEFT JOIN gmd ON catalogs.gmd_id = gmd.id
							LEFT JOIN `authors` ON catalogs.author_id = gmd.id
							LEFT JOIN publishers ON catalogs.publisher_id = publishers.id
							LEFT JOIN languages ON catalogs.language_id = languages.id ";

	public function find($id)
	{
		$query = $this->db->query($this->main_sql . " WHERE catalogs.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query($this->main_sql);
		return $query->result();
	}

	public function get_latest($limit = 10)
	{
		$query = $this->db->query($this->main_sql . " LIMIT ". $limit);
		return $query->result();
	}
}