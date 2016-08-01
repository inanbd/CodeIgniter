<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses_model extends CI_Model {

	public function getAllCourses(){
        $this->load->database();

		$sql="select *from Courses";
		$result=$this->db->query($sql);
		return $result->result_array();
    }

    public function isFacultyAvailable($data){

        $faculty=$data['faculty'];
        $date = $data['date'];
        $sql="select timefrom ,timeto from courses where faculty = '$faculty' and date = '$date'";
        //echo $sql;
      //  echo "<br/>";
        $result=$this->db->query($sql);
		$result=$result->result_array();
        
        $flag = true; $flag2 =true;
        foreach ($result as $value){
                if(($data['timefrom']<$value['timefrom']&&$data['timeto']<=$value['timefrom'])||($data['timefrom']>=$value['timeto']&&$data['timeto']>$value['timeto']))
                {
                    $flag=true;
                }
                else{
                   $flag = false;
                   break;
                }

             }

        if(isset($data['tarikh'])){
            
            $tarikh = $data['tarikh'];
             $classroom=$data['classroom'];
            $sql="select timefrom ,timeto from makeup where faculty ='$faculty' and room = '$classroom'and day = '$tarikh' and status = 'valid' ";
            
           // echo $sql;echo "<br/>";
            $result=$this->db->query($sql);
		    $result=$result->result_array();
            
            foreach ($result as $value){
                    if(($data['timefrom']<$value['timefrom']&&$data['timeto']<=$value['timefrom'])||($data['timefrom']>=$value['timeto']&&$data['timeto']>$value['timeto']))
                    {
                        $flag2=true;
                    }
                    else{
                       $flag2 = false;
                       break;
                    }

                 }
        }
             return $flag&&$flag2;


    }
    public function isDateAvailable($data){
        $classroom=$data['classroom'];
        $date = $data['tarikh'];
        $sql="select timefrom ,timeto from makeup where room = '$classroom'and day = '$date' and status = 'valid' ";
        $result=$this->db->query($sql);
		$result=$result->result_array();
        
        $flag = true;
        foreach ($result as $value){
                if(($data['timefrom']<$value['timefrom']&&$data['timeto']<=$value['timefrom'])||($data['timefrom']>=$value['timeto']&&$data['timeto']>$value['timeto']))
                {
                    $flag=true;
                }
                else{
                   $flag = false;
                   break;
                }

             }

             return $flag;
    
        
    }
    public function isClassroomAvailable($data){
        $classroom=$data['classroom'];
        $date = $data['date'];
        $sql="select timefrom ,timeto from Courses where classroom = '$classroom' and date = '$date'";
        $result=$this->db->query($sql);
		$result=$result->result_array();
        
        $flag = true;
        foreach ($result as $value){
                if(($data['timefrom']<$value['timefrom']&&$data['timeto']<=$value['timefrom'])||($data['timefrom']>=$value['timeto']&&$data['timeto']>$value['timeto']))
                {
                    $flag=true;
                }
                else{
                   $flag = false;
                   break;
                }

             }
             return $flag;
    }

} 