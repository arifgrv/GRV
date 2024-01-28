<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SavaInformation_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('seat_reservation');
        $this->load->library('invoice_generator');
        $this->load->model('savainformation_model');
    }

	public function saveGeneral()
	{
		// MAKE RESERVATION
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			//set validation
    		$this->form_validation->set_rules('seatcheckbox[]', 'Checkbox', 'callback_check_checkbox');
    		$this->form_validation->set_rules('name', 'Full Name', 'required');
    		$this->form_validation->set_rules('mobile', '11 digit mobile number', 'required');
    		$this->form_validation->set_rules('show_name', 'show_name', 'required');
    		$this->form_validation->set_rules('show_date', 'show_date', 'required');
    		$this->form_validation->set_rules('show_time', 'show_time', 'required');


    		if ($this->form_validation->run() == FALSE) {

    			$data = array(
                'current_date' => date('Y-m-d'),
                'Movie_Name' => $this->input->post('show_name'),
                'show_time' => $this->input->post('show_time'),
                'Show_date' => date('Y-m-d', strtotime($this->input->post('show_date'))),
                'CustomerType'=>$this->input->post('CustomerType'),
           		 );
    			
             	$this->load->view('counter/sitplan',$data);
         	}else{

         		//GET INVOICE NUMBER
         		$invoice_number=$this->invoice_generator->generateInvoiceNumber();

         		//accounts data
         		$accounts = array(
         			'invoice_number' =>$invoice_number , 
         			'total_bill' => $this->input->post('totalbill'), 
         			'received_amount' => $this->input->post('totalbill'), 
         			'voucher_code' => '', 
         			'transaction_id' =>'' , 
         			'payment_date' =>date('Y-m-d') , 
         			'sales_type' => 'counter', 
         		);

                $accountsdb=$this->savainformation_model->accounts($accounts);

                ///===============================================================
                //customer data:

                 $GetCustomer = $this->db->get_where('customer', array('mobile'=> $this->input->post('mobile')))->row_array();

                 if ($GetCustomer) {
                    $customer_id =$GetCustomer['customer_id'];
                 }else{
                    $customer=array(
                        'full_name'=>$this->input->post('name'),
                        'email'=>'',
                        'mobile'=>$this->input->post('mobile'),
                        'password'=>$this->input->post('mobile'),
                        'account_type'=>'4',
                        'status'=>'2',
                    );
                    $customer_id=$this->savainformation_model->customer($customer);
                 }

                ///===============================================================
                //reservation data
                foreach ($_POST['seatcheckbox'] as $seat) {
                    $reservation= array(
                        'invoice_number' => $invoice_number , 
                        'customer_id' => $customer_id, 
                        'movie_name' => $this->input->post('show_name'), 
                        'show_time' => $this->input->post('show_time'), 
                        'reserve_date' => date('Y-m-d', strtotime($this->input->post('show_date'))), 
                        'booking_date' => date('Y-m-d'), 
                        'sit_number' => $seat, 
                    );
                    $reservationdb=$this->savainformation_model->reservation($reservation);
         	    }

                $data['reservation']=$reservation;
                $data['customer']=$this->db->get_where('customer', array('customer_id'=> $customer_id))->row_array();
                $data['accounts']=$accounts;

                $this->load->view('counter/invoice',$data);
            }
    	}else{
    		redirect(base_url('index.php/counter')); 
    	}
	}


    public function saveDiscount()
    {
        // MAKE RESERVATION
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //set validation
            $this->form_validation->set_rules('seatcheckbox[]', 'Checkbox', 'callback_check_checkbox');
            $this->form_validation->set_rules('name', 'Full Name', 'required');
            $this->form_validation->set_rules('mobile', '11 digit mobile number', 'required');
            $this->form_validation->set_rules('show_name', 'show_name', 'required');
            $this->form_validation->set_rules('show_date', 'show_date', 'required');
            $this->form_validation->set_rules('show_time', 'show_time', 'required');
            $this->form_validation->set_rules('totalbill', 'totalbill', 'required');
            $this->form_validation->set_rules('discount_amount', 'discount_amount', 'required');
            $this->form_validation->set_rules('discount_ref', 'discount_ref', 'required');


            if ($this->form_validation->run() == FALSE) {

                $data = array(
                'current_date' => date('Y-m-d'),
                'Movie_Name' => $this->input->post('show_name'),
                'show_time' => $this->input->post('show_time'),
                'Show_date' => date('Y-m-d', strtotime($this->input->post('show_date'))),
                'CustomerType'=>$this->input->post('CustomerType'),
                 );
                
                $this->load->view('counter/sitplan',$data);
            }else{

                //GET INVOICE NUMBER
                $invoice_number=$this->invoice_generator->generateInvoiceNumber();

                //accounts data
                $accounts = array(
                    'invoice_number' =>$invoice_number , 
                    'total_bill' => $this->input->post('totalbill'), 
                    'received_amount' => $this->input->post('discount_amount'), 
                    'voucher_code' => $this->input->post('discount_ref'), 
                    'transaction_id' =>'' , 
                    'payment_date' =>date('Y-m-d') , 
                    'sales_type' => 'counter', 
                );

                $accountsdb=$this->savainformation_model->accounts($accounts);

                ///===============================================================
                //customer data:

                 $GetCustomer = $this->db->get_where('customer', array('mobile'=> $this->input->post('mobile')))->row_array();

                 if ($GetCustomer) {
                    $customer_id =$GetCustomer['customer_id'];
                 }else{
                    $customer=array(
                        'full_name'=>$this->input->post('name'),
                        'email'=>'',
                        'mobile'=>$this->input->post('mobile'),
                        'password'=>$this->input->post('mobile'),
                        'account_type'=>'4',
                        'status'=>'2',
                    );
                    $customer_id=$this->savainformation_model->customer($customer);
                 }

                ///===============================================================
                //reservation data
                foreach ($_POST['seatcheckbox'] as $seat) {
                    $reservation= array(
                        'invoice_number' => $invoice_number , 
                        'customer_id' => $customer_id, 
                        'movie_name' => $this->input->post('show_name'), 
                        'show_time' => $this->input->post('show_time'), 
                        'reserve_date' => date('Y-m-d', strtotime($this->input->post('show_date'))), 
                        'booking_date' => date('Y-m-d'), 
                        'sit_number' => $seat, 
                    );
                    $reservationdb=$this->savainformation_model->reservation($reservation);
                }

                $data['reservation']=$reservation;
                $data['customer']=$this->db->get_where('customer', array('customer_id'=> $customer_id))->row_array();
                $data['accounts']=$accounts;

                $this->load->view('counter/invoice',$data);
            }
        }else{
            redirect(base_url('index.php/counter')); 
        }
    }
	// Custom validation rule to check at least one checkbox is checked
	public function check_checkbox($checkboxes) {
    if (empty($checkboxes)) {
        $this->form_validation->set_message('check_checkbox', 'Please select at least one sit.');
        return FALSE;
    } else {
        return TRUE;
    }


}
}
