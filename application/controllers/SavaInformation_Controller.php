<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SavaInformation_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
	    date_default_timezone_set('Asia/Dhaka');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index()
	{
		// MAKE RESERVATION
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {

    		// Set validation rules
    		$this->form_validation->set_rules('name', 'Full Name Required', 'trim|required|min_length[3]|max_length[50]');
		    $this->form_validation->set_rules('email', 'Email Required', 'trim|required|valid_email');
		    $this->form_validation->set_rules('mobile', 'Mobile Required', 'trim|required|exact_length[11]|numeric');
		    $this->form_validation->set_rules('seatcheckbox[]', 'Checkbox', 'callback_check_checkbox');


		    // Run form validation
		    if ($this->form_validation->run() == FALSE) {
		        // If validation fails, reload the form with validation errors
		   		$this->session->set_flashdata('error_message', 'Please select at least one checkbox.');
		         redirect(base_url('index.php/SitPlan'));
		    }else {
		     

		    };
    	}
		$this->load->view('welcome_message');
	}


	// Custom validation rule to check at least one checkbox is checked
	public function check_checkbox($checkboxes) {
    if (empty($checkboxes)) {
        $this->form_validation->set_message('check_checkbox', 'Please select at least one checkbox.');
        return FALSE;
    } else {
        return TRUE;
    }


}
}
