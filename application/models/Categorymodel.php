<?php 

class Categorymodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM categories WHERE categories.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM categories");
		return $query->result();
	}
}