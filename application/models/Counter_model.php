<?php
class Counter_model extends CI_Model {

	public function TGS($today){
		$this->db->select_sum('price', 'total_sales'); 
        $this->db->from('reservationrecord');
        $this->db->where('reserve_date', $today);
        $query = $this->db->get()->row_array(); 
        return $query;
	}
    public function TDS($today){
        $this->db->select_sum('received', 'total_discount_sales'); 
        $this->db->from('discountreservationrecord');
        $this->db->where('reserve_date', $today);
        $query = $this->db->get()->row_array(); 
        return $query;
    }

    public function TGSales(){
        $this->db->select_sum('price', 'total_sales'); 
        $this->db->from('reservationrecord');
        $query = $this->db->get()->row_array(); 
        return $query;
    }
    
    public function TDSales(){
        $this->db->select_sum('received', 'total_discount_sales'); 
        $this->db->from('discountreservationrecord');
        $query = $this->db->get()->row_array();
        return $query;
    }
 
    public function GSales(){
        $this->db->select('*'); 
        $this->db->from('reservationrecord');
        $this->db->group_by('invoice_number');
        $this->db->order_by('invoice_number', 'DESC');
        $query = $this->db->get()->result_array(); 
        return $query;
    }
    
    public function DSales(){
        $this->db->select('*'); 
        $this->db->from('discountreservationrecord');
        $this->db->group_by('invoice_number');
        $this->db->order_by('invoice_number', 'DESC');
        $query = $this->db->get()->result_array(); 
        return $query;
    }



}
?>