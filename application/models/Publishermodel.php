<?php 

class Publishermodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM publishers WHERE publishers.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM publishers");
		return $query->result();
	}
}