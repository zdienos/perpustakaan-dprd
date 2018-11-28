<?php 

class Authormodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM authors WHERE authors.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM authors");
		return $query->result();
	}
}