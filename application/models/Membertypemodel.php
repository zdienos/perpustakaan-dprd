<?php 

class Membertypemodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM membertype WHERE membertype.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM membertype");
		return $query->result();
	}
}