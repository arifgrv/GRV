<?php
class Customer_model extends CI_Model {

    public function AccountsReportByCID($cid) {
            $query = $this->db->select('acc.invoice_number,acc.total_bill,acc.received_amount,acc.comments,cus.full_name AS customer_name, cus.mobile AS customer_mobile,res.customer_id, res.movie_name, res.show_time,res.reserve_date,res.booking_date,res.sit_number')
              ->from('accounts AS acc')
              ->join('reservation AS res', 'acc.invoice_number = res.invoice_number')
              ->join('customer AS cus', 'res.customer_id = cus.customer_id')
              ->where('res.customer_id', $cid)
              ->where('acc.comments', 'Pending')
              ->get();    
        // Check if the query was successful
        if ($query) {
            return $query->result_array();
        } else {
            return $query = $this->db->last_query();
        }
    }

    public function UserByEmail($e){
        $query = $this->db->get_where('customer',array('email'=> $e,));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }


}