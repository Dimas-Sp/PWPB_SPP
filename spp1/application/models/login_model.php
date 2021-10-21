<?php 

class Login_model extends CI_Model{
	function cek_user($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('login', 1);
		return $result;
	}

}

?>
