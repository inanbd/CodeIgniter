<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {    //kaj korbe

    private $usertype="";


	public function index()
	{
		$this->load->view('login');
	}
    public function Allemp(){
        $this -> load -> model('EmpModel');
        $result['all_emp'] = $this->EmpModel->getAllEmployees();
        $this ->load ->library('parser');
        $this ->parser->parse('AllUsers',$result);
       
    }
    public function Addemp(){
        $this -> load -> view('AdminView');


        if($this->input->get_post('btnAdd'))
		{
            $data['username'] =$this->input->get_post('username');
            $data['password'] =$this->input->get_post('password');


            $this -> load -> model('UserModel');
            $result = $this->UserModel->login($data);

            if ($result['type']=='admin'){
                //echo "admin logged in";
                $this -> load -> view('AdminView');
                $usertype ="admin";
            }
            else if ($result['type']=='mgr'){
                // echo "manager";
                $this -> load -> view('MgrView');
            }
            else if ($result['type']=='emp'){
                // echo "emp";
                $this -> load -> view('EmpView');
            }

        }
		else
		{
			$this->load->view('login');
		}
    }
    public function login(){

        if($this->input->get_post('btnLogin'))
		{
            $data['username'] =$this->input->get_post('username');
            $data['password'] =$this->input->get_post('password');
           

            $this -> load -> model('UserModel');
            $result = $this->UserModel->login($data);

            if ($result['type']=='admin'){
                //echo "admin logged in";
                $this -> load -> view('AdminView');
                $usertype ="admin";
            }
            else if ($result['type']=='mgr'){
               // echo "manager";
                $this -> load -> view('MgrView');
            }
            else if ($result['type']=='emp'){
               // echo "emp";
                $this -> load -> view('EmpView');
            }

/*
			$data['name'] = $this->input->get_post('name');
			$data['price'] = $this->input->get_post('price');
			$data['quantity'] = $this->input->get_post('quantity');

			$this->load->model('productmodel');
			$this->productmodel->insert($data);
			//echo 'success';
            
			$this->load->helper('url');
			redirect('http://localhost/ci226/product/index', 'refresh');*/
		}
		else
		{
			$this->load->view('login');
		}
    }
}

//MgrView
//AdminView
//EmpView