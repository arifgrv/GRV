<?php
class Counter_model extends CI_Model {

	public function TotalGeneralSales($today=null){

        if ($today) {
            $this->db->select_sum('received_amount', 'received_amount'); 
            $this->db->from('accounts');
            $this->db->where('payment_date', $today);
            $this->db->where('sales_type', 1);
            $query = $this->db->get()->row_array(); 
            return $query;

        }else{
            $this->db->where('sales_type', 1);
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
            $this->db->where('sales_type', 2);
            $query = $this->db->get()->row_array(); 
            return $query;

        }else{
            $this->db->where('sales_type', 2);
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


}
?>