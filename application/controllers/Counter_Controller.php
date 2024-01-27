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

            $data = array(
                'current_date' => date('Y-m-d'),
                'Movie_Name' => $this->input->post('show_name'),
                'show_time' => $this->input->post('show_time'),
                'Show_date' => date('Y-m-d', strtotime($this->input->post('show_date'))),
            );

             $this->load->view('counter/sitplan',$data);

        }else{
            redirect(base_url('index.php/BookTicket')); 
        }
    }


    public function makeResurve(){

        //Login Check
        $this->is_logged_in();

        // MAKE RESERVATION
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            date_default_timezone_set('Asia/Dhaka');
            $invoice_number=$this->invoice_generator->generateInvoiceNumber();
            
            $data['invoice_number']=$invoice_number;
            $data['customer_name']=$_POST['name'];
            $data['customer_mobile']=$_POST['mobile'];
            $data['movie_name']=$_POST['show_name'];
            $data['show_time']=$_POST['show_time'];
            $data['reserve_date']=date($_POST['show_date']);
            $data['currentdate']=date('Y-m-d');
            
            foreach ($_POST['seatcheckbox'] as $seat) {
                switch (true) {
                    case strpos($seat, 'VIP') !== false:
                        $id=3;
                        $data['sitcategory']=$id;
                        $data['seat_number']=$seat;
                        $data['price']=$this->Login_model->getTicketPriceById($id);
                      break;
                    case strpos($seat, 'J') !== false:
                        $id=1;
                        $data['sitcategory']=$id;
                        $data['seat_number']=$seat;
                        $data['price']=$this->Login_model->getTicketPriceById($id);
                        break;
                    default:
                        $id=2;
                        $data['sitcategory']=$id;
                        $data['seat_number']=$seat;
                        $data['price']=$this->Login_model->getTicketPriceById($id);
                        break;
                }

                //counter save data
                $data['bKashTransID']='';
                $this->db->insert('reservationrecord',$data);

            }

            $invoice['invoice_record']=$this->Login_model->GetInfoByInvoice($invoice_number);
            $this->load->view('invoice',$invoice);
        }else{
            redirect(base_url('index.php/login')); 
        }
    }


}
