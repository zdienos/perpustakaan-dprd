<?php 

class Bookmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM books WHERE books.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM books");
		return $query->result();
	}
}