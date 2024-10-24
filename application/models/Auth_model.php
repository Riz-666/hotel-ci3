<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public $_table = "tb_user";
	const SESSION_KEY = "id_user";


	public function login($username, $password){
		$this->db->where('username',$username);

		$query = $this->db->get($this->_table);
		$user = $query->row();

		//cek sudah terdaftar
		if (!$user){
			return FALSE;
		}
		//cek pass
		if($password != $user->password){
			return FALSE;
		}
		//session
		$this->session->set_userdata([self::SESSION_KEY => $user->id_user]);
		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user(){
		if(!$this->session->has_userdata(self::SESSION_KEY)){
			return null;
		}
		$id_user = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id_user' => $id_user]);
		return $query->row();
	}

	public function logout(){
		$this->session->unset_userdata(self::SESSION_KEY);
			return !$this->session->has_userdata(self::SESSION_KEY);		
	}
}
