<?php

class Room_model extends CI_Model
{
  
	private $_table = 'tb_kamar',
		$_view = 'v_kamar';

	public function get_all()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	
	public function get_by_id($id_kamar){
		$query = $this->db->get_where($this->_table, $id_kamar);
		return $query->result();
	}
	public function input_data($data,$_table){
		$this->db->insert($this->_table, $data);
	}
	public function hapus_data($where){
		$this->db->where($where);
		return $this->db->delete($this->_table);
	}
 
    function update_kamar($data,$where){
		$this->db->where($where);
        return $this->db->update($this->_table, $data, $where);

}
}