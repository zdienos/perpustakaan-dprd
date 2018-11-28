<?php 

class Placemodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM places WHERE places.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM places");
		return $query->result();
	}
}