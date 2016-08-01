<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('Login_view');
						
	}
	
	public function login()
	{
	   $this->load->library('form_validation');
       
       $this->form_validation->set_rules('username', 'Username', 'required');
	   $this->form_validation->set_rules('password', 'Password', 'required');
       
       if($this->form_validation->run()==FALSE) {
        
        $this->load->view('Login_view');
       }
       
       else{
        
           	if($this->input->get_post('login'))	{
           	    
			$data['username'] = $this->input->get_post('username');
			$data['password'] = $this->input->get_post('password');
			
			
			$this->load->model('Login_model');
			$userType=$this->Login_model->loginVerification($data);
			
            if(isset($userType['type'])){
                
                $this->session->set_userdata('loggedin', true);
                $this->session->set_userdata('username',$data['username'] );
                $this->session->set_userdata('type',$userType['type'] );
                
                if($userType['type']=='admin'){
                    $this->load->helper('url');
                    redirect('http://220.158.205.13/classbooking/Admin_controller/index', 'refresh');
                    //$this->load->view('Admin_view');
			     }
            
                else if($userType['type']=='faculty'){
                    // $this->session->set_userdata('id',$userType['id']);
                
                    $this->load->view('Faculty_view');
             
		          }
		  }
          		
		  else{
			$this->load->view('Login_view');					
		  }      
       }   
     }   
       
	}
    

	
}