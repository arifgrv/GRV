<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('home_model');
    }

    public function index()
    {
        $data['homepage']=$this->home_model->homepage();
        $this->load->view('homepage', $data);
    }


}