<?php 

class Membermodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM members WHERE members.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM members");
		return $query->result();
	}
}