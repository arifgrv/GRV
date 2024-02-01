<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('seat_reservation');
        $this->load->model('Counter_model');
        $this->load->model('home_model');
        $this->load->model('Customer_model');
        $this->is_logged_in();
    }

	public function index()
	{
        $data['homepage']=$this->home_model->homepage();      
        $this->load->view('customer/dashboard',$data);
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
                    $this->load->view('customer/ticket_search', $data);
                break;
            
            default:
                // General Ticket
                    $data['moviename']=$this->Counter_model->moviename();
                    $data['showtime']=$this->Counter_model->showtime();
                    $data['CustomerType']='1';
                    $this->load->view('customer/ticket_search', $data);
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

                     $this->load->view('customer/dsitplan',$data);
                    break;
                
                default:
                    $data = array(
                        'current_date' => date('Y-m-d'),
                        'Movie_Name' => $this->input->post('show_name'),
                        'show_time' => $this->input->post('show_time'),
                        'Show_date' => date('Y-m-d', strtotime($this->input->post('show_date'))),
                        'CustomerType'=>$this->input->post('CustomerType'),
                    );

                     $this->load->view('customer/sitplan',$data);
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
            $this->load->view('customer/accounts',$data);
    }

    public function reprint(){
        //Login Check
        $this->is_logged_in();
        $invoice_number=$this->uri->segment(2);
        $id=$this->uri->segment(3);
        switch ($id) {
            case '2':
                $data['InvoiceData']=$this->Counter_model->AccountsReport($invoice_number);
                $this->load->view('customer/dinvoice',$data);
                break;
            default:
                $data['InvoiceData']=$this->Counter_model->AccountsReport($invoice_number);
                $this->load->view('customer/invoice',$data);
                break;
        }
    }

    public function OnlineTicketprint($invoice_number){
        //Login Check
        $this->is_logged_in();

        $result=$this->Customer_model->OnlineTikPrint($invoice_number);
        
        if ($result[0]['received_amount']<$result[0]['total_bill']) {
            $id=2;
        }else{
            $id=1;
        }
        switch ($id) {
            case '2':
                $data['InvoiceData']=$this->Counter_model->AccountsReport($invoice_number);
                $this->load->view('customer/dinvoice',$data);
                break;
            default:
                $data['InvoiceData']=$this->Counter_model->AccountsReport($invoice_number);
                $this->load->view('customer/invoice',$data);
                break;
        }

    }

    public function PendingTicket(){
        $result=$this->Customer_model->UserByEmail($this->session->userdata('user_email'));
        $data['PendingTickes']=$this->Customer_model->PendingTickes($result['customer_id']);
        $this->load->view('customer/PendingTicket',$data);
    }

    public function ApprovedTicket(){
        $result=$this->Customer_model->UserByEmail($this->session->userdata('user_email'));
        $data['ApprovedTicket']=$this->Customer_model->ApprovedTicket($result['customer_id']);
        $this->load->view('customer/ApprovedTicket',$data);
    }

}
