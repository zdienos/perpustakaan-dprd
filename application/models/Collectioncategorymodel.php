<?php 

class Collectioncategorymodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM collectioncategories WHERE collectioncategories.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM collectioncategories");
		return $query->result();
	}
}