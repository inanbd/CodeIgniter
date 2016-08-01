<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function addFaculty($data)
	{
        $name=$data['name'];
        $username=$data['username'];	   
        $password=$data['password'];
        
       	$this->load->database();
		
		$sql="INSERT INTO users VALUES(null,'$username','$password','$name','faculty')";
		$this->db->query($sql);
	}
    public function addClassRoom($data){

        $this->load->database();

		$sql="INSERT INTO classrooms VALUES(null,'$data')";
		$this->db->query($sql);
    }
    public function addCourse($data){

        $faculty = $data['faculty'];
        $title = $data['title'];
        $classroom= $data['classroom'];
        $timefrom =$data['timefrom'];
        $timeto =$data['timeto'];
        $date=$data['date'];

        $this->load->database();
		$sql="INSERT INTO courses VALUES(null,'$title','$faculty','$classroom','$timefrom','$timeto','$date')";
		$this->db->query($sql);
       
    }
	
    public function viewClassRequests()
    {
        $sql = "select * from makeup where status ='invalid' ";
        $result=$this->db->query($sql);
		return $result->result_array();
    }
    public function getAllClassRooms()
    {
        $sql = "select * from classrooms ";
        $result=$this->db->query($sql);
		return $result->result_array();
    }

    public function confirmBooking($data){

        $roomNumber=$data['roomNumber'];
        $id=$data['id'];

        $sql="UPDATE makeup SET room ='$roomNumber',status='valid' where id='$id' ";
        $this->db->query($sql);
    
    }
    
    public function getMakeupList(){
        $sql="select * from makeup where Status='valid'";
        $this->load->database();
        $result=$this->db->query($sql);
		return $result->result_array();
    }


} 