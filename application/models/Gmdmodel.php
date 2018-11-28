<?php 

class Gmdmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM gmd WHERE gmd.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM gmd");
		return $query->result();
	}
}