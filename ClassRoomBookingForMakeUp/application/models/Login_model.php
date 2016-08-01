<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function loginVerification($data)
	{
        $username=$data['username'];	   
		$password=$data['password'];
        $sql = "SELECT type FROM users where username='$username' AND password='$password'";
		$this->load->database();
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	

} 