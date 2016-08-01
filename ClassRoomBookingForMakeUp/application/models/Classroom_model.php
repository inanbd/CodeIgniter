<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classroom_model extends CI_Model {

	public function getAllClassroom(){
        $this->load->database();

		$sql="select *from classrooms";
		$result=$this->db->query($sql);
		return $result->result_array();
    }


} 