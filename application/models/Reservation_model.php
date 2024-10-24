<?php

class Reservation_model extends CI_Model
{
  
	private $_table = 'tb_pemesanan',
		$_view = 'v_detail_pemesanan';


	public function get_all(){
		$query = $this->db->get($this->_view);
		return $query->result();
	}
public function get_by_id($id){
		$query = $this->db->get_where($this->_view, $id);
		return $query->result();
	}
	

	public function insert($reservation)
	{
		if(!$reservation){
			return;
		}
		return $this->db->insert($this->_table, $reservation);
	}

}