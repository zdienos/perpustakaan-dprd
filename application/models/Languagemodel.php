<?php 

class Languagemodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM languages WHERE languages.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM languages");
		return $query->result();
	}
}