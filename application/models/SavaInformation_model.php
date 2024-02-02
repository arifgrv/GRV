<?php
class SavaInformation_model extends CI_Model {

    public function accounts($data){

        $this->db->insert('accounts', $data);
        return $this->db->insert_id(); 
    }

    public function customer($data){

        $this->db->insert('customer', $data);
        return $this->db->insert_id(); 
    }

    public function reservation($data){

        $this->db->insert('reservation', $data);
        return $this->db->insert_id(); 
    }

    public function ChkCustomer($data){

        $query = $this->db->get_where('customer', array('status'=> '1'))->result_array();
        return $query;
    }
    
    public function TicketInformation($invoice_number) {
            $query = $this->db->select('acc.invoice_number,acc.total_bill,acc.received_amount,acc.comments,acc.voucher_code,acc.transaction_id,cus.full_name AS customer_name, cus.mobile AS customer_mobile,res.customer_id, res.movie_name, res.show_time,res.reserve_date,res.booking_date,res.sit_number')
              ->from('accounts AS acc')
              ->join('reservation AS res', 'acc.invoice_number = res.invoice_number')
              ->join('customer AS cus', 'res.customer_id = cus.customer_id')
              ->where('acc.invoice_number', $invoice_number)
              ->order_by('invoice_number', 'DESC')
              ->get();    
        // Check if the query was successful
        if ($query) {
            return $query->result_array();
        } else {
            return $query = $this->db->last_query();
        }
    }

}