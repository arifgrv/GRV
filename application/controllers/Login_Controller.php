<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_model');
    }

	public function index()
	{
		$this->load->view('Login');
	}

	public function logout() {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_mobile');
        $this->session->sess_destroy();
        redirect(base_url('index.php/home')); 
    }
  	
  	public function is_logged_in() {
        if ($this->session->userdata('user_email') == null) {
        	redirect(base_url('index.php/login')); 
        }
    }

	public function LgoCheck()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$result=$this->Login_model->LgoCheck($_POST['email'],$_POST['password']);
			
			if (!empty($result)) {
				//Set Session Data
				$this->session->set_userdata('user_email',$result['email']);
				$this->session->set_userdata('user_name',$result['username']);
				$this->session->set_userdata('user_mobile',$result['mobile']);

				//Show Dashboard
				switch ($result['acctype']) {
					case '1':
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


}
