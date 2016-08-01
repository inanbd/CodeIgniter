<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_controller extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index(){
        $this->load->view('Faculty_view');
        
    }

	public function bookingRequest1()
	{
        $this->load->model('Faculty_model');
        $courses['all_courses'] = $this->Faculty_model->getCourses();

        $this->load->model('TimeSlots_model');
        $courses['timeslots'] = $this->TimeSlots_model->getTimeSlots();

        $this->load->library('parser');
		$this->parser->parse('bookingRequest', $courses);
						
	}
    
   	public function bookingRequest2()
	{   
        
       if($this->input->get_post('request'))	{
           	    
			$data['date'] = $this->input->get_post('date');
            //$date =$data['date'];
			$data['timefrom'] = $this->input->get_post('timefrom');
            $data['timefrom']= str_replace(":","",$data['timefrom']);
            $data['timeto'] = $this->input->get_post('timeto');
            $data['timeto']= str_replace(":","",$data['timeto']);
			$data['course'] = $this->input->get_post('course');

            $data['username']= $this->session->userdata('username');

            if($data['timefrom']<$data['timeto'] ){
                
                if($data['date']!=null){

                    
                    //echo $data['date'];
                    //echo date('l',$date);
                    //echo $d=mktime(0,0,0,8,12,2017);
                    
                    $this->load->model('Faculty_model');
			        $this->Faculty_model->addBookingRequest($data);
                    $this->load->helper('url');
                    redirect('http://220.158.205.13/classbooking/Faculty_Controller/index', 'refresh');
                }
            }
            echo "invalid time/date input";
           
		  }
          		
		  else{
			$this->load->view('bookingRequest');					
		  }      
	}
    
   	public function showCourses()
	{
		$this->load->model('Faculty_model');
		$data['courses']=$this->Faculty_model->getCourses();
        
        
        $this->load->view('bookingRequest',$data);
						
	}
    
   	public function bookingList()
	{
		$this->load->model('Faculty_model');
        $data['bookingList']=$this->Faculty_model->getBookingList($this->session->userdata('username'));

        $this->load->library('parser');
		$this->parser->parse('bookingList_view', $data);
						
	}
    public function makeupList()
	{
		$this->load->model('Faculty_model');
        $data['makeupList']=$this->Faculty_model->getMakeupList($this->session->userdata('username'));

        $this->load->library('parser');
		$this->parser->parse('makeupList_view', $data);
						
	}
    public function logout()
    {
        $this->session->unset_userdata('loggedin');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('type');
        $this->load->helper('url');
        redirect('http://220.158.205.13/classbooking/Login_controller/index', 'refresh');
    }
	
}