<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SavaInformation_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('seat_reservation');
        $this->load->model('savaInformation_model');
    }

	public function save()
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