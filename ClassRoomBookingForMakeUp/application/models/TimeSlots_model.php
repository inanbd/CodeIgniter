<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TimeSlots_model extends CI_Model {

	public function getTimeSlots()
	{
       
		$sql="SELECT time from timeslots order by id";
        $this->load->database();
		$result = $this->db->query($sql);
		return $result->result_array();

	}
	

} 