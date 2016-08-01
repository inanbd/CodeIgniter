<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	public function index()
	{
	   $this->load->view('Admin_view');
						
	}
    public function addFaculty(){
        $this->load->view('Add_faculty');
    }
    
    	
	public function redirect_Admin_view()
	{
	   $this->load->view('Admin_view');
						
	}
    public function addClassRoom()
    {
        if($this->input->get_post('btnAddClassroom')){
            $data = $this->input->get_post('roomnumber');

            $this->load->model('Admin_model');
			$this->Admin_model->addClassRoom($data);

            $this->load->helper('url');
			redirect('http://220.158.205.13/classbooking/Admin_controller/index', 'refresh');
        }

       else{
           $this->load->view('Add_classroom_view');
        }
    }

    public function addCourse()
    {
        if($this->input->get_post('btnAddCourse')){
            $data['title'] = $this->input->get_post('title');
            $data['faculty'] = $this->input->get_post('faculty');
            $data['classroom'] = $this->input->get_post('classroom');

            $data['timefrom'] = $this->input->get_post('timefrom');
            $data['timefrom']= str_replace(":","",$data['timefrom']);

            $data['timeto'] = $this->input->get_post('timeto');
            $data['timeto']= str_replace(":","",$data['timeto']);
            
            $data['date'] = $this->input->get_post('date');

             $this->load->model('Courses_model');
             $result=$this->Courses_model->isFacultyAvailable($data);
             $classavail=$this->Courses_model->isClassroomAvailable($data);

           
            if($classavail&&$result&&$data['timefrom']<$data['timeto']&&$data['title']!=""&&$data['faculty']!=""&&$data['classroom']!=""&&$data['timefrom']!=""&&$data['timeto']!="")
            {
                $this->load->model('Admin_model');
			    $this->Admin_model->addCourse($data);

                $this->load->helper('url');
                redirect('http://220.158.205.13/classbooking/Admin_controller/index', 'refresh');

            }
            else{
                if(!$result){
                    echo "faculty not available on that time <br/>";    
                }
                if(!$classavail){
                    echo"classroom is not available on that time";
                }
                echo "invalid input";    
            }

        }
        else{
            $this->load->model('Faculty_model');
            $data['facultyName']=$this->Faculty_model-> getAllFacultyName();
            
            $this->load->model('TimeSlots_model');
            $data['timeslots'] = $this->TimeSlots_model->getTimeSlots();

            $this->load->model('Classroom_model');
            $data['classroom'] = $this->Classroom_model->getAllClassroom();

            $this->load->library('parser');
            $this->parser->parse('Add_course_view', $data);

        }
       
        
    }
    public function add()
	{
		$data['name']=$this->input->get_post('name');
		$data['username']=$this->input->get_post('username');
        $data['password']=$this->input->get_post('password');

        $this->load->model('Admin_model');
		$this->Admin_model->addfaculty($data);
		
        $this->load->helper('url');
		redirect('http://220.158.205.13/classbooking/Admin_controller/redirect_Admin_view', 'refresh');	
	}

    public function roomBooking()
    {


        if($this->input->get_post('btnConfirm')){
            $data['id']=$this->input->get_post('id');
            $data['roomNumber']=$this->input->get_post('roomNumber');
            $data['classroom']=$this->input->get_post('roomNumber');

            $data['timeto']=$this->input->get_post('timeto');
            $data['timefrom']=$this->input->get_post('timefrom');            
            
            $data['faculty']=$this->input->get_post('faculty');
            $data['tarikh']=$this->input->get_post('day');
            
            //echo $data['tarikh'];
            
            
            $xyz = $data['tarikh'];    
            $strlen = strlen( $xyz );
            $year ="";
            $month="";
            $day="";
            
            for( $i = 0; $i <= $strlen; $i++ ) {
               if($i>=0 && $i<4){
                    $year.= substr( $xyz, $i, 1 );
               }
               if($i>4&&$i<7){
                    $month.= substr( $xyz, $i, 1 );
               }
               if($i>7){
                    $day.= substr( $xyz, $i, 1 );
               }
            }
        
            $d=mktime(0, 0, 0, $month, $day, $year); 
           // echo "Created date is " . date("y-m-d h:i:sa", $d);
            $data['date']= date("l", $d); 
            
            
            
             $this->load->model('Courses_model');
             $facultyavail=$this->Courses_model->isFacultyAvailable($data);
             $classavail=$this->Courses_model->isClassroomAvailable($data);
             $dateavail =$this->Courses_model->isDateAvailable($data);
             
            
            if($dateavail&&$facultyavail&&$classavail){
                $this->load->model('Admin_model');
                $this->Admin_model->confirmBooking($data);
                $this->load->helper('url');
                //redirect('http://220.158.205.13/classbooking/Admin_controller/redirect_Admin_view', 'refresh');
            }
            if(!$facultyavail){
                echo "faculty not available on this time";
                echo "<br/>";
            }
            if(!$classavail){
                echo "class room not available on this time";
                echo "<br/>";
            }
            if(!$dateavail){
                 echo "class room not available on this time";
            }
            
            
            

        }
        else{
            $this->load->model('Admin_model');
            $requests['class']=$this->Admin_model->viewClassRequests();

            $requests['rooms']=$this->Admin_model->getAllClassRooms();

            $this->load->library('parser');
            $this->parser->parse('RoomBookingConfirmation_view', $requests);

        }
        

    }
    public function classSchedule()
    {
    
    }
    public function makeupReport()
    {
        $this->load->model('Admin_model');
        $data['makeupList']=$this->Admin_model->getMakeupList();

        $this->load->library('parser');
		$this->parser->parse('makeupList_view', $data);
    
    }
    
    
	

}