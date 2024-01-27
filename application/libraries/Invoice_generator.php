<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_generator {

    private $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->helper('file');
    }

    public function generateInvoiceNumber() {
        $invoiceNumber = $this->readInvoiceNumber();
        $invoiceNumber++;
        $this->writeInvoiceNumber($invoiceNumber);
        return $invoiceNumber;
    }

    private function readInvoiceNumber() {
        $file_path = APPPATH . 'invoice_number.txt';

        if (file_exists($file_path)) {
            return (int)read_file($file_path);
        } else {
            return 1;
        }
    }

    private function writeInvoiceNumber($invoiceNumber) {
        $file_path = APPPATH . 'invoice_number.txt';
        write_file($file_path, $invoiceNumber);
    }
}
