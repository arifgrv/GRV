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
}