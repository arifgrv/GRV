<?php
class Home_model extends CI_Model {

    public function homepage(){
        $query = $this->db->get_where('homepage', array('status'=> '1'))->result_array();
        return $query;
    }

}