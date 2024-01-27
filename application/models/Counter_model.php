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

}
?>