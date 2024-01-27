<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Counter_model');
        $this->is_logged_in();
    }

	public function index()
	{
        $today=date('Y-m-d');
        $data['TotalGeneralSales']=$this->Counter_model->TotalGeneralSales($today);
        $data['TotalDiscountSales']=$this->Counter_model->TotalDiscountSales($today);
        $data['GeneralSalesTable']=$this->Counter_model->TotalGeneralSales();
        $data['DiscountSalesTable']=$this->Counter_model->TotalDiscountSales();

        $this->load->view('counter/dashboard',$data);
	}

	public function is_logged_in() {
        if ($this->session->userdata('user_email') == null) {
        	redirect(base_url('index.php/login')); 
        }
    }


}
