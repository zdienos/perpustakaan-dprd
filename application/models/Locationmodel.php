<?php 

class Locationmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM locations WHERE locations.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM locations");
		return $query->result();
	}
}