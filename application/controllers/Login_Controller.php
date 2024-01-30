<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('seat_reservation');
        $this->load->model('login_model');

    }

        public function newUser()
    {
        $this->load->view('customer/Registration');
    }
    
    public function RegSave()
    {
        // MAKE RESERVATION
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Set validation rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|exact_length[11]|numeric');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]');

            // Run form validation
            if ($this->form_validation->run() == FALSE) {
                // If validation fails, reload the form with validation errors
                $this->load->view('customer/Registration');
            } else {
                
                //save to DB
                $data=array(
                    'full_name'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'mobile'=>$_POST['mobile'],
                    'password'=>$_POST['password'],
                    'account_type'=>'3',
                    'status'=>'1',
                    );
                $result=$this->login_model->RegSave($data);
                if ($result) {
                   redirect(base_url('index.php/login'));
                }
            }
        }else{
            redirect(base_url('index.php/newUser')); 
        }
    }

	public function login()
	{
		$this->load->view('Login');
	}
 	
  	public function is_logged_in() {
        if ($this->session->userdata('user_email') == null) {
        	redirect(base_url('index.php/login')); 
        }
    }

	public function LgoCheck()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$result=$this->login_model->LgoCheck($_POST['email'],$_POST['password']);
			
			if (!empty($result)) {
				//Set Session Data
				$this->session->set_userdata('user_email',$result['email']);
				$this->session->set_userdata('user_name',$result['full_name']);
				$this->session->set_userdata('user_mobile',$result['mobile']);

				//Show Dashboard
				switch ($result['account_type']) {
					case '1':
						$this->admindashboard();
						break;

					case '2':
						$this->counterdashboard();
						break;
										
					default:
						$this->userdashboard();
						break;
				}
			}else{
				redirect(base_url('index.php/login')); 
			}
		}else{
			redirect(base_url('index.php/login')); 
		}
	}
	
	public function logout() {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_mobile');
        $this->session->sess_destroy();
        redirect(base_url('index.php/homepage')); 
    }

	public function admindashboard(){
		redirect(base_url('index.php/admin')); 
	}

	public function counterdashboard(){
        redirect(base_url('index.php/counter')); 
	}

	public function userdashboard(){
		redirect(base_url('index.php/customer')); 
	}



}
