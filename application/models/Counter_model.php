<?php
class Counter_model extends CI_Model {

	public function TotalGeneralSales($today=null){

        if ($today) {
            $this->db->select_sum('received_amount', 'received_amount'); 
            $this->db->from('accounts');
            $this->db->where('payment_date', $today);
            $this->db->where('voucher_code=', '');
            $query = $this->db->get()->row_array(); 
            return $query;

        }else{
            $this->db->where('voucher_code =', '');
            $this->db->order_by('invoice_number', 'DESC');
            $query = $this->db->get('accounts')->result_array();
            return $query;
        }
	}
  
    public function TotalDiscountSales($today=null){

        if ($today) {
            $this->db->select_sum('received_amount', 'received_amount'); 
            $this->db->from('accounts');
            $this->db->where('payment_date', $today);
            $this->db->where('voucher_code !=', '');
            $query = $this->db->get()->row_array(); 
            return $query;

        }else{
            $this->db->where('voucher_code !=', '');
            $this->db->order_by('invoice_number', 'DESC');
            $query = $this->db->get('accounts')->result_array();
            return $query;
        }
    }
    
    public function moviename($id=null){
        if ($id) {
            $this->db->select('MovieName');
            $this->db->from('moviename');
            $this->db->where('id', $id);
            $query  = $this->db->get()->row_array();
            return $query;
        }else{
           $query = $this->db->get_where('moviename', array('Status'=> '1'))->result_array();
            return $query; 
        }
        
    }

    public function showtime($id=null){
        if ($id) {
            $this->db->select('ShowTime');
            $this->db->from('showtime');
            $this->db->where('id', $id);
            $query  = $this->db->get()->row_array();
            return $query;
        }else{
            $query = $this->db->get('showtime')->result_array();
            return $query;
        }
        
    }

    public function checkReservations($sitNumbers, $reserveDate, $showtime, $movieName)
    {
        $this->db->select('sit_number');
        $this->db->from('reservation');
        $this->db->where_in('sit_number', $sitNumbers);
        $this->db->where('reserve_date', $reserveDate);
        $this->db->where('show_time', $showtime);
        $this->db->where('movie_name', $movieName);

        $query  = $this->db->get()->row_array();

        if ($query) {
            return $query;
        }else{
            return null;
        }
    }

    public function Accounts_data($fromDate, $toDate) {
        $this->db->where('payment_date >=', $fromDate);
        $this->db->where('payment_date <=', $toDate);
        $query = $this->db->get('accounts');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function AccountsReport($invo=null) {
        if ($invo) {
            $query = $this->db->select('acc.invoice_number,acc.total_bill,acc.received_amount,acc.voucher_code,acc.transaction_id,cus.full_name AS customer_name, cus.mobile AS customer_mobile, res.movie_name, res.show_time,res.reserve_date,res.booking_date,res.sit_number')
              ->from('accounts AS acc')
              ->join('reservation AS res', 'acc.invoice_number = res.invoice_number')
              ->join('customer AS cus', 'res.customer_id = cus.customer_id')
              ->where('acc.invoice_number', $invo)
              ->group_by('invoice_number')
              ->order_by('invoice_number', 'DESC')
              ->get();
        }else{
            $query = $this->db->select('acc.invoice_number,acc.total_bill,acc.received_amount,acc.voucher_code,acc.transaction_id,cus.full_name AS customer_name, cus.mobile AS customer_mobile, res.movie_name, res.show_time,res.reserve_date,res.booking_date,res.sit_number')
              ->from('accounts AS acc')
              ->join('reservation AS res', 'acc.invoice_number = res.invoice_number')
              ->join('customer AS cus', 'res.customer_id = cus.customer_id')
              ->group_by('invoice_number')
              ->order_by('invoice_number', 'DESC')
              ->get();
        }


        // Check if the query was successful
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getTicketPriceByRowName($rowNamePrefix) {
        $this->db->select('TicketPrice');
        $this->db->from('sitcategory');
        $this->db->like('rowname', substr($rowNamePrefix, 0, 1), 'after');
        $query = $this->db->get();

        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    public function PaymentVerify() {
            $query = $this->db->select('acc.invoice_number,acc.total_bill,acc.received_amount,acc.comments,acc.voucher_code,acc.transaction_id,acc.transaction_id,cus.full_name AS customer_name, cus.mobile AS customer_mobile,res.customer_id, res.movie_name, res.show_time,res.reserve_date,res.booking_date,res.sit_number')
              ->from('accounts AS acc')
              ->join('reservation AS res', 'acc.invoice_number = res.invoice_number')
              ->join('customer AS cus', 'res.customer_id = cus.customer_id')
              ->where('acc.comments', 'Pending')
              ->group_by('invoice_number')
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
?>