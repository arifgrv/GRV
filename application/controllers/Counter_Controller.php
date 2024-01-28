<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('seat_reservation');
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

    public function ticket_Search($type)
    {
        //Login Check
        $this->is_logged_in();

        switch ($type) {
            case '2':
                // Discount Ticket
                    $data['moviename']=$this->Counter_model->moviename();
                    $data['showtime']=$this->Counter_model->showtime();
                    $data['CustomerType']='2';
                    $this->load->view('counter/ticket_search', $data);
                break;
            
            default:
                // General Ticket
                    $data['moviename']=$this->Counter_model->moviename();
                    $data['showtime']=$this->Counter_model->showtime();
                    $data['CustomerType']='1';
                    $this->load->view('counter/ticket_search', $data);
                break;
        }

    }

    public function sitplan()
    {

        //Login Check
        $this->is_logged_in();
        
        // viw sit plan 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            switch ($this->input->post('CustomerType')) {
                case '2':
                    $data = array(
                        'current_date' => date('Y-m-d'),
                        'Movie_Name' => $this->input->post('show_name'),
                        'show_time' => $this->input->post('show_time'),
                        'Show_date' => date('Y-m-d', strtotime($this->input->post('show_date'))),
                        'CustomerType'=>$this->input->post('CustomerType'),
                    );

                     $this->load->view('counter/dsitplan',$data);
                    break;
                
                default:
                    $data = array(
                        'current_date' => date('Y-m-d'),
                        'Movie_Name' => $this->input->post('show_name'),
                        'show_time' => $this->input->post('show_time'),
                        'Show_date' => date('Y-m-d', strtotime($this->input->post('show_date'))),
                        'CustomerType'=>$this->input->post('CustomerType'),
                    );

                     $this->load->view('counter/sitplan',$data);
                    break;
            }

            

        }else{
            redirect(base_url('index.php/BookTicket/1')); 
        }
    }

    public function AccountsReport()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $fromDate=date($_POST['Date_From']);
            $toDate=date($_POST['Date_TO']);
            $data['accReport']=$this->Counter_model->Accounts_data($fromDate, $toDate);
        }else{
            date_default_timezone_set('Asia/Dhaka');
            $fromDate=date('Y-m-d');
            $toDate=date('Y-m-d');
            $data['accReport']=$this->Counter_model->Accounts_data($fromDate, $toDate);
        }
            $this->load->view('counter/accounts',$data);
    }



}
