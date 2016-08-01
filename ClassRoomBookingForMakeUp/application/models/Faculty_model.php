<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_model extends CI_Model {
     public function __construct()
    {
        parent::__construct();
       	$this->load->library('session');
    }
    public function getCourses(){
        $username=$this->session->userdata('username');
        
        $this->load->database();
		
		$sql="select title from courses where faculty='$username'";
		$result=$this->db->query($sql);
		return $result->result_array();
    }
    public function getAllFacultyName(){
        $this->load->database();

		$sql="select username from users where type = 'faculty'";
		$result=$this->db->query($sql);
		return $result->result_array();
    }

    public function addBookingRequest($data)
    {

        $username = $data['username'];
        $timefrom = $data['timefrom'];
        $timeto = $data['timeto'];
        $day = $data['date'];
        $course = $data['course'];


        $this->load->database();
        $sql="INSERT INTO makeup VALUES(null,'$day','$timefrom','$timeto',null,'$username','$course','invalid')";
        //id,day,slot,room,faculty,course,status
		$this->db->query($sql);
    }

    public function getBookingList($username){
        $sql="select * from makeup where faculty = '$username'";

        $this->load->database();
        $result=$this->db->query($sql);
		return $result->result_array();
    }
    public function getMakeupList($username){
        $sql="select * from makeup where faculty = '$username' AND Status='valid'";
        $this->load->database();
        $result=$this->db->query($sql);
		return $result->result_array();
    }

} 