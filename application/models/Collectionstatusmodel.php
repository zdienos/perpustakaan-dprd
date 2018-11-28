<?php 

class Collectionstatusmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM collectionstatus WHERE collectionstatus.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM collectionstatus");
		return $query->result();
	}
}